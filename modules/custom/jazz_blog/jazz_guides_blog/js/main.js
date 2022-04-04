let onceDone = false;
Drupal.behaviors.exampleModule = {
    attach: function (context, settings) {
        //run once
        if (onceDone) {
            return;
        }
        onceDone = true;
        //////
        jQuery(document).on('change', '.blogs-change-target-value', function (evt) {
            evt.preventDefault();
            let $this = jQuery(this);
            let $target = jQuery($this.attr("data-target"));
            $target.val($this.val());
            console.log($this, $target, $this.val());
        });
        jQuery(document).on("click", "#blogs-filter-submit", function (evt) {
            evt.preventDefault();
            jQuery("[value='[guide-filter-submit]']").trigger("click");
        });
    }
};


