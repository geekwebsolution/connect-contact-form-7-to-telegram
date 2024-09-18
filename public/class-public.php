<?php
if (!class_exists('cf7tel_public')) {
    class cf7tel_public
    {
        public function __construct()
        {
            add_action('wp_enqueue_scripts',  array($this, 'cf7tel_enqueue_scripts'), PHP_INT_MAX);
            add_action('wp_footer', array($this, 'cf7tel_footer_chat_widget'));
        }

        public function cf7tel_enqueue_scripts()
        {
            wp_register_style("cf7tel_style", plugins_url('admin/assets/css/cf7tel-front-style.css', __DIR__), array(), CF7TEL_PLUGIN_VERSION);
            wp_enqueue_style("cf7tel_style");

            wp_register_script("cf7tel_script",  plugins_url('admin/assets/js/cf7tel-front-script.js', __DIR__), array('jquery'), CF7TEL_PLUGIN_VERSION, true);
            wp_enqueue_script("cf7tel_script");

            $cf7tel_options = cf7tel_options();

            $time_delay_status  = $cf7tel_options['triggers-targeting']['triggers_time_delay'];
            $triggers_form_after_second  = $cf7tel_options['triggers-targeting']['triggers_show_form_after_second'];
            $form_close_on_submit = $cf7tel_options['customize_form']['chat_widget_form_behaviour_close_on_submit'];
            $on_click_greetings_action = $cf7tel_options['greetings']['greeting_behavior_on_click_action'];

            $bot_username = get_option('cf7tel_telegram_bot_username','');

            $redirect_url = "https://t.me/$bot_username";
            
            wp_localize_script( 'cf7tel_script', 'cf7telObj',
                array(
                    'time_delay_status' => $time_delay_status,
                    'triggers_form_after_second' => $triggers_form_after_second,
                    'form_close_on_submit' => $form_close_on_submit,
                    'on_click_greetings_action' => $on_click_greetings_action,
                    'redirect_tel_url' => $redirect_url
                )
            );
        }

        /**
         * Chat Widgets
         */
        static function cf7tel_footer_chat_widget()
        {
            $cf7tel_options = cf7tel_options();

            $chat_widget_status  = isset($cf7tel_options['triggers-targeting']['triggers_activate_cf7_form_chat_widget']) ? $cf7tel_options['triggers-targeting']['triggers_activate_cf7_form_chat_widget'] : "";

            if(isset($chat_widget_status) && $chat_widget_status == "on") {
                // Include Chat Widget
                include_once('templates/chat-widget.php');
            }
        }
    }
    new cf7tel_public();
}