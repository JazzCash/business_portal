(function(Drupal, drupalSettings, once) {
    let runOnce = {};
    Drupal.behaviors.qaForm = {
        attach: function(context, settings) {
            //use jQuery.once instead of this 
            if (runOnce.qaForm) {
                return;
            }
            runOnce.qaForm = 1;

            let $fakeContainer = jQuery(".qaform-fake-container");
            if (!$fakeContainer.length) {
                return;
            }
            let $actualContainer = jQuery(".qaform-actual-container");
            let titleName = $fakeContainer.find("input").attr("name");
            $fakeContainer.find("input").attr("name", "").attr("id", "").on("input", function() {
                $actualContainer.find("input[name='" + titleName + "']").val(this.value);

            });
        }
    }

    Drupal.behaviors.qaLike = {
        attach: function(context, settings) {
            //use jQuery.once instead of this 
            if (runOnce.qaLike) {
                return;
            }
            runOnce.qaLike = 1;

            jQuery("body").on('click', '.discussion-page-likes', function(evt) {
                evt.preventDefault();
                let thisAnchor = this;
                if (thisAnchor.ajaxRunning) {
                    return;
                }

                let $thisAnchor = jQuery(thisAnchor);
                let nid = $thisAnchor.attr("data-nid");
                thisAnchor.ajaxRunning = true;
                jQuery.ajax({
                    url: Drupal.url("jazzcash_community/discussion/" + nid + "/likedislike"),
                    dataType: "json",
                    type: "Post",
                    async: true,
                    data: {},
                    success: function(data) {
                        thisAnchor.ajaxRunning = false;
                        if (data.op == "liked") {
                            $thisAnchor.find(".like-icon").addClass("liked");
                        } else {
                            $thisAnchor.find(".like-icon").removeClass("liked");
                        }
                        $thisAnchor.find(".like-count").html(data.count);
                    },
                    error: function(xhr, exception) {
                        var msg = "";
                        thisAnchor.ajaxRunning = false;
                        console.log(xhr, exception);
                    }
                });
            });
        }
    }
}(Drupal, drupalSettings));