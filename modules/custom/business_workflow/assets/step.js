(function($, Drupal) {
    $(document).ready(function() {
        jQuery("#0").text("Business selection");
        jQuery("#1").text("Registeration");
        jQuery("#2").text("Product Selection");
        jQuery("#3").text("Business Information");
        jQuery("#4").text("Business Documents")
        jQuery("[name=field_select_the_type_of_your_co]").closest(".fieldgroup").hide();
        jQuery(".company-type-checkbox").each(function() {
            let $this = jQuery(this);
            let value = $this.attr("data-value");
            let $target = jQuery("[name=field_select_the_type_of_your_co][value=" + value + "]");
            $this.append($target);

        });
        jQuery('#edit-field-full-name-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-full-name-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-name-of-business-company-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-name-of-business-company-0-value').prop('title', 'Enter alphabets only');


        jQuery('#edit-field-mobile-number-0-value').prop('pattern', '[0-9 ]+');
        jQuery('#edit-field-mobile-number-0-value').prop('title', 'Enter numbers only');

        ///Business Information
        jQuery('#edit-field-business-information-0-subform-field-business-name-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-business-information-0-subform-field-business-name-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-business-information-0-subform-field-nature-of-business-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-business-information-0-subform-field-nature-of-business-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-business-information-0-subform-field-place-of-incorporation-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-business-information-0-subform-field-place-of-incorporation-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-business-information-0-subform-field-ntn-issuing-authority-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-business-information-0-subform-field-ntn-issuing-authority-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-business-information-0-subform-field-business-mailing-address-0-value').prop('type', 'email');

        jQuery('#edit-field-business-information-0-subform-field-phone-0-value').prop('pattern', '[0-9 ]+');
        jQuery('#edit-field-business-information-0-subform-field-phone-0-value').prop('title', 'Enter numbers only');

        jQuery('#edit-field-business-information-0-subform-field-fax-number-0-value').prop('pattern', '[0-9 ]+');
        jQuery('#edit-field-business-information-0-subform-field-fax-number-0-value').prop('title', 'Enter numbers only');

        // Directors Information
        jQuery('#edit-field-directors-information-0-subform-field-full-name-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-directors-information-0-subform-field-full-name-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-directors-information-0-subform-field-title-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-directors-information-0-subform-field-title-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-directors-information-0-subform-field-contact-number-0-value').prop('pattern', '[0-9 ]+');
        jQuery('#edit-field-directors-information-0-subform-field-contact-number-0-value').prop('title', 'Enter numbers only');

        // Authorize Personal Details
        jQuery('#edit-field-authorize-personnel-detail-0-subform-field-full-name-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-authorize-personnel-detail-0-subform-field-full-name-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-authorize-personnel-detail-0-subform-field-title-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-authorize-personnel-detail-0-subform-field-title-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-authorize-personnel-detail-0-subform-field-contact-number-0-value').prop('pattern', '[0-9 ]+');
        jQuery('#edit-field-authorize-personnel-detail-0-subform-field-contact-number-0-value').prop('title', 'Enter numbers only');

        // Technology Person of Contact
        jQuery('#edit-field-technology-person-of-conta-0-subform-field-full-name-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-technology-person-of-conta-0-subform-field-full-name-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-technology-person-of-conta-0-subform-field-contact-number-0-value').prop('pattern', '[0-9 ]+');
        jQuery('#edit-field-technology-person-of-conta-0-subform-field-contact-number-0-value').prop('title', 'Enter numbers only');

        // Settelment Details
        jQuery('#edit-field-settlement-details-0-subform-field-account-holder-name-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-settlement-details-0-subform-field-account-holder-name-0-value').prop('title', 'Enter alphabets only');

        jQuery('#edit-field-settlement-details-0-subform-field-account-holder-mobile-numb-0-value').prop('pattern', '[0-9 ]+');
        jQuery('#edit-field-settlement-details-0-subform-field-account-holder-mobile-numb-0-value').prop('title', 'Enter numbers only');

        // Terms & Conditions
        jQuery('#edit-field-agreement-0-subform-field-full-name-0-value').prop('pattern', '[A-Za-z ]+');
        jQuery('#edit-field-agreement-0-subform-field-full-name-0-value').prop('title', 'Enter alphabets only');


    })
    Drupal.behaviors.registerSteps = {
        attach: function(context, settings) {
            $(context).find(".custom-register").once('make-step').each(function() {
                let $form = $(this);

                $(".register-checkbox").each(function() {
                    let $checkbox = $("<input type='radio' name='register-checkbox' value='" + Math.random() + "'/>")
                    $(this).append($checkbox);
                });



                let $steps = $form.find(".register-step");
                $stepNavig = $("<ul style='text-align: center;'></ul>");
                $stepNavig.insertBefore($form);
                $steps.on('click', function(evt) {
                    // evt.preventDefault();
                })
                let $formActions = $form.find('[data-drupal-selector="edit-submit"]');
                let currentStep = 0;
                let stepsLength = $steps.length;
                for (let i = 0; i < stepsLength; i++) {
                    let $li = $("<li style='border-radius: 10px;display:inline-block;border:1px solid black;padding:5px;margin:5px;' data-step='" + i + "' id='" + i + "'>Step " + (i + 1) + "</li>");
                    $stepNavig.append($li);
                    $li.on('click', function(evt) {
                        currentStep = i;
                        handleNextPrev();
                    });
                }
                $formActions.hide();
                let $stepActions = jQuery("<div class='step-actions'></div>");
                let $prev = jQuery("<button class='step-prev'>Prev</button>");
                let $next = jQuery("<button class='step-next'>Next</button>");
                $stepActions.append($prev);
                $stepActions.append($next);
                $formActions.parent().prepend($stepActions);
                let firstTime = true;


                let stepBeforeNext = {
                    "step_0": function() {
                        $checkBoxes = $("[name=register-checkbox]");
                        let selectedAddress = null;
                        for (let i = 0; i < $checkBoxes.length; i++) {
                            if ($checkBoxes[i].checked) {
                                selectedAddress = $checkBoxes.eq(i).closest(".registration-link").attr("data-target");
                                break;
                            }
                        }
                        if (selectedAddress === null) {
                            alert("Please select 1");
                            return false;
                        } else if (selectedAddress !== '#next') {
                            window.location = selectedAddress;
                        }
                        return true;
                    },
                    "step_1": function() {
                        let $nextBtn = $(this);
                        let $form = $nextBtn.closest("form");
                        let mobile = $form.find('[name="field_mobile_number[0][value]"]').val();
                        let mail = $form.find('[name="mail"]').val();
                        if (mobile.trim() == '') {
                            $form.find('[name="field_mobile_number[0][value]"]').focus();
                            return false;
                        }
                        if (mail.trim() == '') {
                            $form.find('[name="mail"]').focus();
                            return false;
                        }


                        let $modal = $(`<div class="otp-popup">
                        <h2>
                        Verify your Account
                          <span data-pop>&times;</span>
                        </h2>
                        <p>Just one quick check to verify your account. We’ve sent verification codes to haroon.liaquat@hotmailarcanainfo.com & +923444446911</p>
                        <div>
                        <div>
                        <div id="mobile-otp-error">Mobile error</div>
                        <label>
                        Enter SMS Code
                        <input type="text" id="otp-mobile" name="mobile"/>
                        </label>
                        </div>
                        <div>

                        <div id="email-otp-error">Email error</div>
                            <label>
                            Enter Email Code
                            <input type="text" id="otp-email" name="otp-email"/>
                            </label>
                            </div>  
                        </div>
                      </div>`);
                        let $submitOtp = $("<button>Verify</button>");
                        $modal.append($submitOtp);
                        $modal.insertBefore($form);
                        jQuery.ajax({
                            url: drupalSettings.path.baseUrl + "business_workflow/otpGenerate",
                            type: "POST",
                            data: { mobile: mobile, mail: mail },
                            success: function(d) {
                                console.log(d);
                                $modal.slideDown(500);
                            },
                            error: function(e) {
                                console.error(e);
                                alert("ERROR");
                            }
                        });

                        $submitOtp.on('click', function() {
                            let otpMail = $("#otp-email").val();
                            let otpMobile = $("#otp-mobile").val();
                            jQuery.ajax({
                                url: drupalSettings.path.baseUrl + "business_workflow/otpverify",
                                type: "POST",
                                data: { mobile: mobile, mail: mail, otpMobile: otpMobile, otpMail: otpMail },
                                success: function(d) {
                                    $modal.remove();
                                    currentStep++;
                                    handleNextPrev();
                                },
                                error: function(e) {
                                    console.error(e.responseJSON);
                                    //                                 alert("ERROR");
                                }
                            });
                        })

                        // $(document).mousedown(function(evt) {
                        //     if ($(".otp-popup").length) {
                        //         evt.preventDefault();
                        //     } else {
                        //         return;
                        //     }
                        //     if ($(evt.target).closest(".otp-popup").length) {
                        //         return;
                        //     }
                        //     closeOtpModal();
                        // });

                        function closeOtpModal() {
                            $(".otp-popup").slideUp(500, function() {
                                $(this).remove();
                            })
                        }
                        return false;
                        $checkBoxes = $("[name=register-checkbox]");
                        let selectedAddress = null;
                        for (let i = 0; i < $checkBoxes.length; i++) {
                            if ($checkBoxes[i].checked) {
                                selectedAddress = $checkBoxes.eq(i).closest(".registration-link").attr("data-target");
                                break;
                            }
                        }
                        if (selectedAddress === null) {
                            alert("Please select 1");
                            return false;
                        } else if (selectedAddress !== '#next') {
                            window.location = selectedAddress;
                        }
                        return true;
                    },
                };



                let handleNextPrev = () => {
                    let $current = $steps.eq(currentStep);
                    $steps.removeClass('active');
                    $steps.removeProp('open');
                    $current.addClass('active');
                    $current.prop('open', true);

                    if (currentStep == 0) {
                        $prev.slideUp(100);
                    } else if (currentStep == stepsLength - 1) {
                        $next.slideUp(100);
                        $formActions.show();
                    } else {
                        $next.slideDown(100);
                        $formActions.hide();
                    }
                    if (currentStep > 0) {
                        $prev.slideDown(100);
                    }
                    if (!firstTime) {
                        console.log(firstTime);
                        $('html, body').animate({
                            scrollTop: $current.offset().top - 100
                        });
                    }
                    firstTime = false;
                };

                $prev.on('click', function(evt) {
                    evt.preventDefault();
                    if (currentStep > 0) {
                        currentStep--;
                        handleNextPrev();
                    }

                });
                $next.on('click', function(evt) {
                    evt.preventDefault();
                    let $inputs = $steps.eq(currentStep).find('input,textarea,checkbox,radio');
                    let allValid = true;
                    for (let input of $inputs) {
                        if (!input.checkValidity()) {
                            input.reportValidity();
                            return;
                        }
                    }
                    if (currentStep < stepsLength - 1) {
                        let proceed = true;
                        if (stepBeforeNext["step_" + currentStep]) {
                            proceed = stepBeforeNext["step_" + currentStep].bind(this)();
                        }
                        if (proceed) {
                            currentStep++;
                            handleNextPrev();
                        }
                    }
                });

                $(".product-selection").on('click', function() {
                    let $this = $(this);
                    console.log($this, $this.parent(), $this.parent().find('.product-form'));
                    $this.parent().find('.product-form').toggleClass('active');
                    $this.toggleClass('active');


                });

                handleNextPrev();
            });
        }
    };


    Drupal.behaviors.companyDetials = {
        attach: function(context, settings) {
            $(context).find(".custom-register").once('company-details').each(function() {
                let $form = $(this);
                let $sideBarItems = $form.find(".company-detail-sidebar-item");
                let $detailItems = $form.find(".company-detail-item");
                // let current = $stepActions;
                let current = 0;
                let total = $sideBarItems.length;
                $sideBarItems.eq(current).addClass('active');
                $detailItems.eq(current).addClass('active');

                $sideBarItems.on('click', function() {
                    let $this = $(this);
                    let id = $this.attr('id');
                    $sideBarItems.removeClass('active');
                    $this.addClass('active');
                    $detailItems.removeClass("active");
                    console.log($detailItems.find(`[data-item-name="${id}"]`), id);
                    $detailItems.find(`[data-item-name="${id}"]`).closest('.company-detail-item').addClass("active");

                });

            });
        }
    };

    Drupal.behaviors.resolutionBoards = {
        attach: function(context, settings) {
            $(context).find(".custom-register").once('resolution-boards').each(function() {
                let $form = $(this);
                let $sideBarItems = $form.find(".resolution-board-sidebar-item");
                let $detailItems = $form.find(".resolution-board-item");
                // let current = $stepActions;
                let current = 0;
                let total = $sideBarItems.length;
                $sideBarItems.eq(current).addClass('active');
                $detailItems.eq(current).addClass('active');

                $sideBarItems.on('click', function() {
                    let $this = $(this);
                    let id = $this.attr('id');
                    $sideBarItems.removeClass('active');
                    $this.addClass('active');
                    $detailItems.removeClass("active");
                    $detailItems.find(`[data-item-name="${id}"]`).closest('.resolution-board-item').addClass("active");

                });

            });
        }
    };

    Drupal.behaviors.fileCustomDropArea = {
        attach: function(context, settings) {
            $(context).find(".custom-register").find(".custom-drop-container").each(function() {
                let $container = $(this);
                if ($container.hasClass("custom-drop-done")) {
                    return;
                }
                $container.addClass("custom-drop-done");

                let $dropArea;
                $dropArea = $container.find(".custom-drop");
                if (!$dropArea.length) {
                    let $dropArea = $("<div class='custom-drop'></div>");
                }

                function dragInEnter(evt) {
                    evt.preventDefault();
                    $(this).addClass("draged");
                }

                function dragOutLeave(evt) {
                    evt.preventDefault();
                    $(this).removeClass("draged");
                }
                $container.find("label").append($dropArea);

                $dropArea.on("dragover", dragInEnter);
                $dropArea.on("dragenter", dragInEnter);

                $dropArea.on("dragleave", dragOutLeave);
                $dropArea.on("dragend", dragOutLeave);

                $dropArea.on("drop", function(evt) {
                    evt.preventDefault();
                    let $files = $dropArea.closest(".custom-drop-container").find("input[type=file]");
                    if ($files.length) {
                        $files[0].files = evt.originalEvent.dataTransfer.files;
                        console.log($files[0]);
                        jQuery($files[0]).trigger("change");
                    }
                });


                return;
                let $form = $(this);
                let $sideBarItems = $form.find(".resolution-board-sidebar-item");
                let $detailItems = $form.find(".resolution-board-item");
                // let current = $stepActions;
                let current = 0;
                let total = $sideBarItems.length;
                $sideBarItems.eq(current).addClass('active');
                $detailItems.eq(current).addClass('active');

                $sideBarItems.on('click', function() {
                    let $this = $(this);
                    let id = $this.attr('id');
                    $sideBarItems.removeClass('active');
                    $this.addClass('active');
                    $detailItems.removeClass("active");
                    $detailItems.find(`[data-item-name="${id}"]`).closest('.resolution-board-item').addClass("active");

                });

            });
        }
    };

})(jQuery, Drupal);