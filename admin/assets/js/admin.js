/**
 * After document load initialize events
 */
jQuery( document ).ready( function(){
	cf7tel_init();
});

jQuery(window).on('load', function () {

    var cf7tel_page = cf7telObj.cf7tel_page;

    if(typeof cf7tel_page !== "undefined" && cf7tel_page == "contact_page_connect-cf7tel") {

        /**
         * Add color picker to fields
         */
        jQuery('.cf7tel_colorpicker').wpColorPicker();
        
        const elem = jQuery('input[type="range"]');
        elem.on('input', function() {
            const newValue = jQuery(this).val();
            const target = jQuery(this).parent().find('.cf7tel-range-px');
            target.html(newValue + 'px');
        });

        /**
         * Multi step admin JS
         */
        function updateURLHash(step) {
            window.location.hash = 'step=' + step;
        }

        function getStepFromHash() {
            const hash = window.location.hash.substring(1); // Remove the '#'
            const params = new URLSearchParams(hash);
            return params.get('step') || '1'; // Default to step 1 if no step is found
        }

        /** On Telegram Number change JS */
        // jQuery('#cf7tel_wh_number').change(function() {
        //     var dInput = jQuery(this).val();
        //     if(dInput.length >= 7 && dInput != '') {
        //         jQuery(this).removeClass('cf7tel-input-error');
        //     }else{
        //         jQuery(this).addClass('cf7tel-input-error');
        //     }
        // });

        jQuery('input[name="cf7tel_form_chats[]"]').change(function() {
            var $parent = jQuery(this).parents('.cf7tel-step');
            if($parent.find('input[type=checkbox]').length) {

                if($parent.find('input[type=checkbox]:checked').length > 0) {
                    $parent.find('input[type=checkbox]').removeClass('cf7tel-input-error');
                }else{
                    // isValid = false;
                    $parent.find('input[type=checkbox]').addClass('cf7tel-input-error');
                }
            }
        });

        /** Dependecies field JS Start */

        /**  Step 2: Customize Form JS  */

        // Icon Size Change JS
        jQuery('body').on('change','input[name=chat_widget_icon_size]',function(){
            const dep_group_cls = jQuery(this).filter(":checked").val();
            if (dep_group_cls == "custom") {
                jQuery(this).parents('.cf7tel-block-box').find('.chat_widget_icon_size_group').removeClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-block-box').find('.chat_widget_icon_size_group').addClass('cf7tel-hidden');
            }
        });

        // Enable Call to action Change JS
        jQuery('body').on('change','input[name=chat_widget_cta_switch]',function(){
            if (jQuery(this).is(":checked")) {
                jQuery(this).parents('.cf7tel-block-box').find('.chat_widget_cta_switch_group').removeClass('cf7tel-hidden');
                jQuery('input[name=chat_widget_cta_text_size]:checked').trigger("change");
            }else{
                jQuery(this).parents('.cf7tel-block-box').find('.chat_widget_cta_switch_group').addClass('cf7tel-hidden');
            }
        });

        // Call to action Text Size Change JS
        jQuery('input[name=chat_widget_cta_text_size]').change(function(){
            const dep_group_cls = jQuery(this).filter(":checked").val();
            if (dep_group_cls != "custom") {
                jQuery(this).parents('.cf7tel-block-box').find('.chat_widget_cta_text_size_group').addClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-block-box').find('.chat_widget_cta_text_size_group').removeClass('cf7tel-hidden');
            }
        });

        /**  Step 3: Greetings JS  */

        jQuery('input[name=display_greeting_popup]').change(function(){
            if (jQuery(this).is(":checked")) {
                jQuery(this).parents('.cf7tel-step-box').find('.display_greeting_popup_group').removeClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-step-box').find('.display_greeting_popup_group').addClass('cf7tel-hidden');
            }
        });

        jQuery('input[name=wave_greetings_style_1_show_greeting_cta]').change(function() {
            if (jQuery(this).is(":checked")) {
                jQuery(this).parents('.cf7tel-step-box').find('.wave_greetings_style_1_show_greeting_cta').removeClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-step-box').find('.wave_greetings_style_1_show_greeting_cta').addClass('cf7tel-hidden');
            }
        });

        jQuery('input[name=choose_greetings_template]').change(function(){
            const dep_group_cls = jQuery(this).filter(":checked").val();
            if (dep_group_cls == "wave") {
                jQuery(this).parents('.cf7tel-step-box').find('.display_greeting_popup_group.choose_greetings_template_wave_group').removeClass('cf7tel-hidden');
                jQuery(this).parents('.cf7tel-step-box').find('.display_greeting_popup_group.choose_greetings_template_simple_group').addClass('cf7tel-hidden');
                jQuery('input[name=choose_wave_greetings_template_type]:checked').trigger("change");
                jQuery('input[name=wave_greetings_show_main_content]:checked').trigger("change");
            }else{
                jQuery(this).parents('.cf7tel-step-box').find('.display_greeting_popup_group.choose_greetings_template_simple_group').removeClass('cf7tel-hidden');
                jQuery(this).parents('.cf7tel-step-box').find('.display_greeting_popup_group.choose_greetings_template_wave_group').addClass('cf7tel-hidden');
            }
        });

        jQuery('input[name=choose_wave_greetings_template_type]').change(function(){
            const dep_group_cls = jQuery(this).filter(":checked").val();
            if(dep_group_cls == "choose_wave_greetings_template_type_style_2") {
                // jQuery(this).parents('.cf7tel-step-box').find('.choose_wave_greetings_template_type_style_2_group').removeClass('cf7tel-hidden');
                jQuery(this).parents('.cf7tel-step-box').find('.choose_wave_greetings_template_type_style_1_group').addClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-step-box').find('.choose_wave_greetings_template_type_style_1_group').removeClass('cf7tel-hidden');
                // jQuery(this).parents('.cf7tel-step-box').find('.choose_wave_greetings_template_type_style_2_group').addClass('cf7tel-hidden');
            }
        });

        jQuery('input[name=wave_greetings_show_main_content]').change(function() {
            const wave_template_type = jQuery(this).parents('.cf7tel-step-box').find('input[name=choose_wave_greetings_template_type]:checked').val();
            if (jQuery(this).is(":checked")) {
                jQuery(this).parents('.cf7tel-step-box').find('.wave_greetings_show_main_content').removeClass('cf7tel-hidden');
                if(wave_template_type != "choose_wave_greetings_template_type_style_1") {
                    jQuery(this).parents('.cf7tel-block-box').find('.choose_wave_greetings_template_type_style_1_group').addClass('cf7tel-hidden');
                }else{
                    // jQuery(this).parents('.cf7tel-block-box').find('.choose_wave_greetings_template_type_style_2_group').addClass('cf7tel-hidden');
                }
            }else{
                jQuery(this).parents('.cf7tel-step-box').find('.wave_greetings_show_main_content').addClass('cf7tel-hidden');
            }
        });

        // jQuery('input[name=wave_greetings_style_2_show_greeting_cta]').change(function() {
        //     if (jQuery(this).is(":checked")) {
        //         jQuery(this).parents('.cf7tel-step-box').find('.wave_greetings_style_2_show_greeting_cta').removeClass('cf7tel-hidden');
        //     }else{
        //         jQuery(this).parents('.cf7tel-step-box').find('.wave_greetings_style_2_show_greeting_cta').addClass('cf7tel-hidden');
        //     }
        // });

        jQuery('input[name=simple_greetings_heading_size]').change(function(){
            const dep_group_cls = jQuery(this).filter(":checked").val();
            if (dep_group_cls == "custom") {
                jQuery(this).parents('.cf7tel-block-box').find('.simple_greetings_heading_size_group').removeClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-block-box').find('.simple_greetings_heading_size_group').addClass('cf7tel-hidden');
            }
        });

        jQuery('body').on('change','input[name=simple_greetings_message_size]',function(){
            const dep_group_cls = jQuery(this).filter(":checked").val();
            if (dep_group_cls == "custom") {
                jQuery(this).parents('.cf7tel-block-box').find('.simple_greetings_message_size_group').removeClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-block-box').find('.simple_greetings_message_size_group').addClass('cf7tel-hidden');
            }
        });

        jQuery('body').on('change','input[name=wave_greetings_style_1_heading_size]',function(){
            const dep_group_cls = jQuery(this).filter(":checked").val();
            if (dep_group_cls == "custom") {
                jQuery(this).parents('.cf7tel-block-box').find('.wave_greetings_style_1_heading_size_group').removeClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-block-box').find('.wave_greetings_style_1_heading_size_group').addClass('cf7tel-hidden');
            }
        });

        jQuery('body').on('change','input[name=wave_greetings_style_1_message_size]',function(){
            const dep_group_cls = jQuery(this).filter(":checked").val();
            if (dep_group_cls == "custom") {
                jQuery(this).parents('.cf7tel-block-box').find('.wave_greetings_style_1_message_size_group').removeClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-block-box').find('.wave_greetings_style_1_message_size_group').addClass('cf7tel-hidden');
            }
        });

        jQuery('body').on('change','input[name=triggers_time_delay]',function(){
            if (jQuery(this).is(":checked")) {
                jQuery(this).parents('.cf7tel-block-box').find('.triggers_time_delay_group').removeClass('cf7tel-hidden');
            }else{
                jQuery(this).parents('.cf7tel-block-box').find('.triggers_time_delay_group').addClass('cf7tel-hidden');
            }
        });

        // Triggers & Greeting JS
        jQuery('body').on('change','input[name=targeting_exclude_all_except_switch]',function(){
            if (jQuery(this).is(":checked")) {
                jQuery(this).parents(".cf7tel-block-box").find(".cf7tel-exclude-all-except").removeClass("cf7tel-form-pro-field");
                jQuery(this).parents(".cf7tel-block-box").find(".cf7tel-exclude-pages").addClass("cf7tel-form-pro-field");
            }else{
                jQuery(this).parents(".cf7tel-block-box").find(".cf7tel-exclude-pages").removeClass("cf7tel-form-pro-field");
                jQuery(this).parents(".cf7tel-block-box").find(".cf7tel-exclude-all-except").addClass("cf7tel-form-pro-field");
            }
        });

        /** Dependecies field JS End */

        /** Multi step form JS Start */

        function showStep(step) {
            jQuery('.cf7tel-step').hide();
            jQuery('.cf7tel-step[data-step="' + step + '"]').show();
            
            jQuery('.cf7tel-step-label').hide();
            jQuery('.cf7tel-step-label[data-step="' + step + '"]').show();

            updateURLHash(step); // Update URL hash when changing steps

            // Show or hide buttons based on the current step
            const totalSteps = jQuery('.cf7tel-step').last().data('step');
            if (step >= totalSteps) {
                jQuery('.cf7tel-next-btn').hide();
                jQuery('.cf7tel-submit-btn').show();
            } else {
                jQuery('.cf7tel-next-btn').show();
                jQuery('.cf7tel-submit-btn').hide();
            }

            jQuery('.cf7tel-nav-tab ul li').each(function() {
                const btnStep = jQuery(this).find('.cf7tel-nav-tab-btn').data('step');
                if (btnStep <= step) {
                    jQuery(this).addClass('cf7tel-nav-tab-active');
                } else {
                    jQuery(this).removeClass('cf7tel-nav-tab-active');
                }
            });
        }

        /** Validate fields in the active step */
        function validateStep(step) {
            let isValid = true;
            jQuery('.cf7tel-step[data-step="' + step + '"] input.cf7tel-required').each(function() {
                jQuery(this).removeClass('cf7tel-input-error');

                
                if(jQuery(this).is(':checkbox')) {

                    if(jQuery(this).parents('.cf7tel-step').find('input[type=checkbox]').length) {

                        if(jQuery(this).parents('.cf7tel-step').find('input[type=checkbox]:checked').length > 0) {

                        }else{
                            isValid = false;
                            jQuery(this).addClass('cf7tel-input-error');
                        }
                    }
                    
                }
            });
            return isValid;
        }

        // Initialize the step based on URL hash or default to step 1
        let currentStep = getStepFromHash();

        // Check if the step exists
        const totalSteps = jQuery('.cf7tel-step').last().data('step') || 1;
        currentStep = (currentStep > totalSteps || currentStep < 1) ? '1' : currentStep;
        

        showStep(currentStep);

        // Next Button Click
        jQuery('.cf7tel-next-btn').click(function () {
            if (validateStep(currentStep)) {
                if (currentStep < totalSteps) { // Adjust based on the total number of steps
                    currentStep++;
                    showStep(currentStep);
                }
            }else{
                // alert('Please fill out all required fields.');
            }
        });

        // Back Button Click
        jQuery('.cf7tel-prev-btn').click(function () {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        // Navigation Tabs Click
        jQuery('.cf7tel-nav-tab-btn').click(function () {
            const targetStep = jQuery(this).data('step');
            if (targetStep <= currentStep || validateStep(currentStep)) {
                currentStep = targetStep;
                showStep(currentStep);
            } else {
                // alert('Please fill out all required fields before proceeding.');
            }
            // currentStep = jQuery(this).data('step');
            // showStep(currentStep);
        });

        /**
         * Select file from media library field JS
         */
        var cf7tel_file_frame;

        jQuery('.cf7tel-upload-button').on('click', function (e) {
            e.preventDefault();
            var $this = jQuery(this);

            // Create the media frame.
            cf7tel_file_frame = wp.media.frames.cf7tel_file_frame = wp.media({
                title: 'Select a file',
                button: {
                    text: 'Use this file',
                },
                multiple: false // Set to true to allow multiple files to be selected
            });

            // When a file is selected, run a callback.
            cf7tel_file_frame.on('select', function () {
                var attachment = cf7tel_file_frame.state().get('selection').first().toJSON();
                $this.parents('.cf7tel-file-upload').find('#cf7tel_customize_icon_url').val(attachment.id);
                $this.parents('.cf7tel-file-upload').find('.cf7tel-file-preview').remove();
                $this.parents('.cf7tel-file-upload').find('.cf7tel-upload-button').after('<div class="cf7tel-file-preview"><img src="' + attachment.url + '"" /></div>');
            });

            // Finally, open the modal
            cf7tel_file_frame.open();
        });

    }
});

/**
 * Function to approve / delete subscriber from list
 */
function cf7tel_init(){
	jQuery( '.cf7tel_notice' ).each( function( index, notice ){ 
		var panel = jQuery( notice );
		panel.on( 'click', '.buttons a', { chat : panel.data( 'chat' ) }, function( e ){
			var btn = jQuery( this );
			if ( ! confirm( cf7telObj.l10n['confirm_' + btn.data('action') ] ) ) return;
			var postdata = {
				action		: 'cf7tel_telegram',
				_wpnonce	: cf7telObj.nonce,
				do_action	: btn.data( 'action' ),
				chat		: e.data.chat
			}
			
			jQuery.post( cf7telObj.ajax, postdata, function( response ) {
				if ( true == response.result ) {
					var panel = jQuery( '.cf7tel_notice[data-chat="' + response.chat + '"]' );
					panel.attr( 'data-status', response.new_status );
				}
			});
		} );
	} );
}