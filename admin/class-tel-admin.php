<?php
if (!class_exists('cf7tel_connect_tel_settings')) {
    class cf7tel_connect_tel_settings
    {

        public function __construct()
        {
            add_action( 'wpcf7_editor_panels', array( $this, 'connect_tel_add_tab' ));
            add_action( 'wpcf7_after_save', array( $this, 'cf7tel_save_tel_settings_call' ));
        }
        
        public function connect_tel_add_tab($panels)
        {
            $panels['connect-telegram'] = array(
                'title'     => __('Telegram', CF7TEL_TEXT_DOMAIN),
                'callback'  => array( $this, 'connect_tel_settings_callback' ),
            );
            return $panels;
        }

        /**
         * Telegram settings HTML for Contact form edit screen
         */
        public function connect_tel_settings_callback($post)
        {
            $cf7cw_functions = new cf7tel_tel_functions();
            $approved_chats = $cf7cw_functions->get_chats();

            $cf7tel_tel_option_nonce = wp_create_nonce('cf7tel_tel_option_nonce');
            $form_id = $post->id();
            $option = get_option('cf7tel_connect_tel_' . $form_id, $default = array());
            $cf7tel_message_body = (isset($option['cf7tel_message_body'])) ? htmlentities($option['cf7tel_message_body']) : cf7tel_connect_tel_settings::connect_tel_message_body();
            $cf7_active_chats    = (isset($option['cf7tel_form_chats']) && !empty($option['cf7tel_form_chats'])) ? explode(",", $option['cf7tel_form_chats']) : array();
            $cf7tel_status       = (isset($option['cf7tel_status']) && $option['cf7tel_status'] == 'on' && !empty($approved_chats) && !empty($cf7_active_chats)) ? 'checked' : ''; ?>
            
            <h2><?php esc_html_e('Telegram', CF7TEL_TEXT_DOMAIN); ?></h2>
            <legend>
                <?php esc_html_e('In the message body, you can use these tags:', CF7TEL_TEXT_DOMAIN); ?><br>
                <?php $post->suggest_mail_tags(); ?>
            </legend>
            <div class="cf7tel-sec">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php esc_html_e('Status', CF7TEL_TEXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <label class="cf7tel-switch">
                                <input type="checkbox" class="cf7tel-checkbox" name="cf7tel-tel-status" value="on" <?php echo esc_attr($cf7tel_status); ?>>
                                <span class="cf7tel-slider cf7tel-round"></span>
                            </label>
                            <p><?php esc_html_e('Enable to connect telegram for this contact form.', CF7TEL_TEXT_DOMAIN); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php esc_html_e('Select Chats', CF7TEL_TEXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <?php
                            if( isset($approved_chats) && !empty($approved_chats) ) {
                                
                                foreach( $approved_chats as $key => $chat ) {
                                    $first_name = isset($chat['first_name']) ? sanitize_text_field($chat['first_name']) : '';
                                    $last_name  = isset($chat['last_name']) ? sanitize_text_field($chat['last_name']) : '';
                                    $fullname   = (!empty($first_name) && !empty($last_name)) ? $first_name .' '. $last_name : $first_name . $last_name;
                                    $chat       = (!empty($chat)) ? array_map('sanitize_text_field', $chat) : [];
                                    ?>

                                    <input type="checkbox" id="<?php echo esc_attr( $chat['id'] ); ?>" name="cf7tel_form_chats[]" value="<?php echo esc_attr( $chat['id'] ); ?>" <?php echo esc_attr( in_array( $chat['id'], $cf7_active_chats ) ? 'checked' : '' ); ?>>
                                    <label for="<?php echo esc_attr( $chat['id'] ); ?>"><?php echo esc_html( implode( " ", array( empty( $str = trim( $chat['id'] > 0 ? $fullname : $chat['title'] ) ) ? "[{$chat['id']}]" : $str, empty( $chat['username'] ) ? '' : '@'. $chat['username'], isset( $chat['date'] ) ? wp_date( 'j F Y H:i:s', $chat['date'] ) : '' ) ) ); ?></label><br>
                                    
                                    <p><?php esc_html_e('Select any chats to send telegram messages.', CF7TEL_TEXT_DOMAIN); ?></p>
                                    <?php
                                }
                            }else{ ?>
                                    <p><?php echo esc_html('Please approve at least one chat in Subscribers list. To check subscriber list go to ', CF7TEL_TEXT_DOMAIN); ?><a href="<?php echo esc_url( admin_url('admin.php?page=cf7tel_telegram') ) ?>" title="<?php esc_attr_e( 'CF7 Telegram Settings', CF7TEL_TEXT_DOMAIN ); ?>"><?php esc_html_e( 'CF7 Telegram Settings', CF7TEL_TEXT_DOMAIN ); ?></a>.</p>
                                <?php
                            }
                            ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php esc_html_e('Message', CF7TEL_TEXT_DOMAIN); ?></label>
                        </th>
                        <td>
                            <textarea id="cf7tel_message_body" name="cf7tel-tel-message-body" cols="100" rows="18" class="large-text code"><?php echo esc_html(wp_unslash($cf7tel_message_body)); ?></textarea>
                            <p><?php esc_html_e('Note:', CF7TEL_TEXT_DOMAIN); ?> <i><?php esc_html_e('You can customize above telegram message body.', CF7TEL_TEXT_DOMAIN); ?></i></p>
                        </td>
                    </tr>
                    <div class="cf7tel-hidden-input">
                        <input type="hidden" name="cf7tel-tel-nonce" value="<?php echo esc_attr($cf7tel_tel_option_nonce);  ?>">
                    </div>
                </table>
            </div>
            <?php
        }

        public function cf7tel_save_tel_settings_call($contact_form)
        {
            $form_id = $contact_form->id();
            $form_title = $contact_form->title();
            $cf7tel_tel_wpnonce = sanitize_text_field($_POST['cf7tel-tel-nonce']);

            $cf7tel_status = $cf7tel_message_body = $cf7tel_form_chats = "";
            if (isset($_POST['cf7tel-tel-status']))       $cf7tel_status = sanitize_text_field($_POST['cf7tel-tel-status']);
            if (isset($_POST['cf7tel-tel-message-body'])) $cf7tel_message_body = html_entity_decode($_POST['cf7tel-tel-message-body']);
            if(isset($_POST['cf7tel_form_chats']) && !empty($_POST['cf7tel_form_chats']))   $cf7tel_form_chats = sanitize_text_field( implode(",",$_POST['cf7tel_form_chats']) );

            $cf7tel['form_id'] = $form_id;
            $cf7tel['form_title'] = $form_title;
            $cf7tel['cf7tel_form_chats'] = $cf7tel_form_chats;
            $cf7tel['cf7tel_status'] = $cf7tel_status;
            $cf7tel['cf7tel_message_body'] = $cf7tel_message_body;
            
            if (wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['cf7tel-tel-nonce'] ) ) , 'cf7tel_tel_option_nonce' )) {
                update_option('cf7tel_connect_tel_' . $form_id, $cf7tel, $autoload = null);
            }
        }

        static function connect_tel_message_body()
        {
            return '<b>Form Title</b>: [form-title] ' . "\n" . '<b>Email</b>: [your-email]' . "\n" . '<b>Subject</b>: [your-subject]' . "\n" . '<b>Message</b>:' . "\n" . '[your-message]' . "\n" . '--' . "\n" . 'This message was sent from a contact form on <b>[_site_title]</b> ([_site_url])';
        }
    }
    new cf7tel_connect_tel_settings();
}
