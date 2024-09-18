jQuery(document).ready(function() {
    var options = cf7telObj;

    document.addEventListener('wpcf7mailsent', function (event) {
        if(options.form_close_on_submit == "on") {
            if(jQuery('body').find('.cf7tel-chat-widgets').find('.cf7tel-chat-widget-begin').is(":visible")) {
                jQuery('body').find('.cf7tel-chat-widgets .cf7tel-chat-widget-close-btn').trigger('click');
            }
        }
    }, false);

    jQuery('body').on('click','.cf7tel-chat-widget-greetings-simple, .cf7tel-chat-widget-handle-btn, .cf7tel-chat-widget-greeting-box', function() {

        if(!jQuery(this).hasClass('cf7tel-chat-widget-handle-btn') && options.on_click_greetings_action == "redirected_to_telegram_directly") {
            if(options.on_click_greetings_action == "redirected_to_telegram_directly") {
                window.open(options.redirect_tel_url, '_blank');
            }
        }else{            
            if(jQuery(this).hasClass('cf7tel-chat-widget-handle-btn') && jQuery(this).parents('.cf7tel-chat-widgets').find('.cf7tel-chat-widget-begin').is(":visible")) {
                
                jQuery(this).parents('.cf7tel-chat-widgets').find('.cf7tel-chat-widget-close-btn').trigger('click');
            }else{
                
                
                if(jQuery(this).parents('.cf7tel-chat-widgets').find('.cf7tel-chat-widget-greetings-simple').is(":visible")) {
                    jQuery(this).parents('.cf7tel-chat-widgets').find('.cf7tel-chat-widget-greetings-simple').hide();
                }
    
                if(jQuery(this).parents('.cf7tel-chat-widgets').find('.cf7tel-chat-widget-greetings-wave').is(":visible")) {
                    jQuery(this).parents('.cf7tel-chat-widgets').find('.cf7tel-chat-widget-greetings-wave').hide();
                }
    
                jQuery(this).parents('.cf7tel-chat-widgets').find('.cf7tel-chat-widget-begin').css("display","flex");
                
            }
        }
    });

    jQuery('body').on('click', '.cf7tel-chat-widget-greetings-close-btn', function(){
        jQuery(this).parents('.cf7tel-chat-widget-greetings').remove();
    });
    
    jQuery('body').on('click','.cf7tel-chat-widget-close-btn', function() {
        jQuery(this).parents('.cf7tel-chat-widget-begin').hide();
        jQuery(this).parents('.cf7tel-chat-widgets').find('.cf7tel-chat-widget-greeting-box').css("display","flex");
    });
});

jQuery(window).on('load', function() {
    var options = cf7telObj;

    if(options.time_delay_status == "on") {
        if(options.triggers_form_after_second != "") {
            if(!jQuery('.cf7tel-chat-widgets').is('visible')) {
                setTimeout(() => {
                    jQuery('.cf7tel-chat-widgets').show();
                }, parseInt(options.triggers_form_after_second * 1000));
            }
        }
    }
});