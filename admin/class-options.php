<?php
if (!defined('ABSPATH')) exit;

$options = cf7tel_options();

if (isset($_POST['cf7tel_save_changes'])) {
    $updated_option = array();

    if (isset($_POST['_wpnonce']) && wp_verify_nonce(sanitize_text_field($_POST['_wpnonce']), 'cf7tel_wpnonce')) {

        $updated_option['telegram_info']['cf7tel_form_chats']       = isset($_POST['cf7tel_form_chats']) ? array_map('sanitize_text_field', $_POST['cf7tel_form_chats']) : array();

        $updated_option['customize_form']['chat_widget_icon_size']    = isset($_POST['chat_widget_icon_size']) ? sanitize_text_field($_POST['chat_widget_icon_size']) : '';
        $updated_option['customize_form']['chat_widget_icon_size_custom']  = isset($_POST['chat_widget_icon_size_custom']) ? sanitize_text_field($_POST['chat_widget_icon_size_custom']) : '';
        $updated_option['customize_form']['chat_widget_icon_position']  = isset($_POST['chat_widget_icon_position']) ? sanitize_text_field($_POST['chat_widget_icon_position']) : '';

        $updated_option['customize_form']['chat_widget_cta_switch']  = isset($_POST['chat_widget_cta_switch']) ? sanitize_text_field($_POST['chat_widget_cta_switch']) : '';
        $updated_option['customize_form']['chat_widget_cta_text']  = isset($_POST['chat_widget_cta_text']) ? sanitize_text_field($_POST['chat_widget_cta_text']) : '';
        $updated_option['customize_form']['chat_widget_cta_text_size']  = isset($_POST['chat_widget_cta_text_size']) ? sanitize_text_field($_POST['chat_widget_cta_text_size']) : '';
        $updated_option['customize_form']['chat_widget_cta_text_size_custom']  = isset($_POST['chat_widget_cta_text_size_custom']) ? sanitize_text_field($_POST['chat_widget_cta_text_size_custom']) : '';

        $updated_option['customize_form']['chat_widget_contact_form_7']  = isset($_POST['chat_widget_contact_form_7']) ? sanitize_text_field($_POST['chat_widget_contact_form_7']) : '';
        $updated_option['customize_form']['chat_widget_form_title']  = isset($_POST['chat_widget_form_title']) ? sanitize_text_field($_POST['chat_widget_form_title']) : '';
        $updated_option['customize_form']['chat_widget_header_text']  = isset($_POST['chat_widget_header_text']) ? sanitize_text_field($_POST['chat_widget_header_text']) : '';
        $updated_option['customize_form']['chat_widget_footer_text']  = isset($_POST['chat_widget_footer_text']) ? sanitize_text_field($_POST['chat_widget_footer_text']) : '';
        $updated_option['customize_form']['chat_widget_form_font_family']  = isset($_POST['chat_widget_form_font_family']) ? sanitize_text_field($_POST['chat_widget_form_font_family']) : '';

        $updated_option['customize_form']['chat_widget_form_behaviour_open_by_default']  = isset($_POST['chat_widget_form_behaviour_open_by_default']) ? sanitize_text_field($_POST['chat_widget_form_behaviour_open_by_default']) : '';
        $updated_option['customize_form']['chat_widget_form_behaviour_close_on_submit']  = isset($_POST['chat_widget_form_behaviour_close_on_submit']) ? sanitize_text_field($_POST['chat_widget_form_behaviour_close_on_submit']) : '';


        $updated_option['greetings']['display_greeting_popup']  = isset($_POST['display_greeting_popup']) ? sanitize_text_field($_POST['display_greeting_popup']) : '';
        $updated_option['greetings']['choose_greetings_template']  = isset($_POST['choose_greetings_template']) ? sanitize_text_field($_POST['choose_greetings_template']) : '';
        $updated_option['greetings']['choose_simple_greetings_template_type']  = isset($_POST['choose_simple_greetings_template_type']) ? sanitize_text_field($_POST['choose_simple_greetings_template_type']) : '';
        $updated_option['greetings']['choose_wave_greetings_template_type']  = isset($_POST['choose_wave_greetings_template_type']) ? sanitize_text_field($_POST['choose_wave_greetings_template_type']) : '';

        $updated_option['greetings']['simple_greetings_heading']  = isset($_POST['simple_greetings_heading']) ? sanitize_text_field($_POST['simple_greetings_heading']) : '';
        $updated_option['greetings']['simple_greetings_heading_size']  = isset($_POST['simple_greetings_heading_size']) ? sanitize_text_field($_POST['simple_greetings_heading_size']) : '';
        $updated_option['greetings']['simple_greetings_heading_custom_size']  = isset($_POST['simple_greetings_heading_custom_size']) ? sanitize_text_field($_POST['simple_greetings_heading_custom_size']) : '';
        $updated_option['greetings']['simple_greetings_message']  = isset($_POST['simple_greetings_message']) ? sanitize_text_field($_POST['simple_greetings_message']) : '';
        $updated_option['greetings']['simple_greetings_message_size']  = isset($_POST['simple_greetings_message_size']) ? sanitize_text_field($_POST['simple_greetings_message_size']) : '';
        $updated_option['greetings']['simple_greetings_message_custom_size']  = isset($_POST['simple_greetings_message_custom_size']) ? sanitize_text_field($_POST['simple_greetings_message_custom_size']) : '';
        $updated_option['greetings']['simple_greetings_style_1_font_family']  = isset($_POST['simple_greetings_style_1_font_family']) ? sanitize_text_field($_POST['simple_greetings_style_1_font_family']) : '';

        $updated_option['greetings']['wave_greetings_show_main_content']  = isset($_POST['wave_greetings_show_main_content']) ? sanitize_text_field($_POST['wave_greetings_show_main_content']) : '';
        $updated_option['greetings']['wave_greetings_style_1_custom_icon']  = isset($_POST['wave_greetings_style_1_custom_icon']) ? sanitize_text_field($_POST['wave_greetings_style_1_custom_icon']) : '';
        $updated_option['greetings']['wave_greetings_style_1_icon_position']  = isset($_POST['wave_greetings_style_1_icon_position']) ? sanitize_text_field($_POST['wave_greetings_style_1_icon_position']) : '';
        $updated_option['greetings']['wave_greetings_style_1_greeting_heading']  = isset($_POST['wave_greetings_style_1_greeting_heading']) ? sanitize_text_field($_POST['wave_greetings_style_1_greeting_heading']) : '';
        $updated_option['greetings']['wave_greetings_style_1_heading_size']  = isset($_POST['wave_greetings_style_1_heading_size']) ? sanitize_text_field($_POST['wave_greetings_style_1_heading_size']) : '';
        $updated_option['greetings']['wave_greetings_style_1_heading_custom_size']  = isset($_POST['wave_greetings_style_1_heading_custom_size']) ? sanitize_text_field($_POST['wave_greetings_style_1_heading_custom_size']) : '';
        $updated_option['greetings']['wave_greetings_style_1_message']  = isset($_POST['wave_greetings_style_1_message']) ? sanitize_text_field($_POST['wave_greetings_style_1_message']) : '';
        $updated_option['greetings']['wave_greetings_style_1_message_size']  = isset($_POST['wave_greetings_style_1_message_size']) ? sanitize_text_field($_POST['wave_greetings_style_1_message_size']) : '';
        $updated_option['greetings']['wave_greetings_style_1_message_custom_size']  = isset($_POST['wave_greetings_style_1_message_custom_size']) ? sanitize_text_field($_POST['wave_greetings_style_1_message_custom_size']) : '';

        $updated_option['greetings']['wave_greetings_style_1_show_greeting_cta']  = isset($_POST['wave_greetings_style_1_show_greeting_cta']) ? sanitize_text_field($_POST['wave_greetings_style_1_show_greeting_cta']) : '';
        $updated_option['greetings']['wave_greetings_style_1_greeting_cta_text']  = isset($_POST['wave_greetings_style_1_greeting_cta_text']) ? sanitize_text_field($_POST['wave_greetings_style_1_greeting_cta_text']) : '';
        $updated_option['greetings']['wave_greetings_style_1_font_family']  = isset($_POST['wave_greetings_style_1_font_family']) ? sanitize_text_field($_POST['wave_greetings_style_1_font_family']) : '';

        $updated_option['greetings']['greeting_behavior_on_click_action']  = isset($_POST['greeting_behavior_on_click_action']) ? sanitize_text_field($_POST['greeting_behavior_on_click_action']) : '';

        $updated_option['triggers-targeting']['triggers_activate_cf7_form_chat_widget']  = isset($_POST['triggers_activate_cf7_form_chat_widget']) ? sanitize_text_field($_POST['triggers_activate_cf7_form_chat_widget']) : '';
        $updated_option['triggers-targeting']['triggers_time_delay']  = isset($_POST['triggers_time_delay']) ? sanitize_text_field($_POST['triggers_time_delay']) : '';
        $updated_option['triggers-targeting']['triggers_show_form_after_second']  = isset($_POST['triggers_show_form_after_second']) ? sanitize_text_field($_POST['triggers_show_form_after_second']) : '';
        $updated_option['triggers-targeting']['targeting_exclude_pages']  = isset($_POST['targeting_exclude_pages']) ? array_map('sanitize_text_field', $_POST['targeting_exclude_pages']) : array();
        $updated_option['triggers-targeting']['targeting_exclude_all_except_switch']  = isset($_POST['targeting_exclude_all_except_switch']) ? sanitize_text_field($_POST['targeting_exclude_all_except_switch']) : '';
        $updated_option['triggers-targeting']['targeting_exclude_all_except_pages']  = isset($_POST['targeting_exclude_all_except_pages']) ? array_map('sanitize_text_field', $_POST['targeting_exclude_all_except_pages']) : array();
    }

    if (sizeof($updated_option) > 0) {
        update_option('cf7tel_options', $updated_option);
        if(isset($_POST['greeting_behavior_on_click_action']) && $_POST['greeting_behavior_on_click_action'] == 'redirected_to_telegram_directly') {
            $classFunctions = new cf7tel_tel_functions();
            $getBot = $classFunctions->cf7tel_api_request( 'getMe' );
            if(isset($getBot->ok)) {
                if(isset($getBot->result)) {
                    if(isset($getBot->result->username)) {
                        $bot_username = sanitize_text_field($getBot->result->username);
                        update_option('cf7tel_telegram_bot_username',$bot_username);
                    }
                }
            }
        }
        ?>
        <script type="text/javascript">
            window.location = "<?php echo admin_url('admin.php?page=connect-cf7tel#step=1'); ?>";
            window.location.reload();
        </script>
        <?php
    }
}

$cf7tel_functions = new cf7tel_tel_functions();
$approved_chats = $cf7tel_functions->cf7tel_get_chats();

$cf7_active_chats    = (isset($options['telegram_info']['cf7tel_form_chats'])) ? $options['telegram_info']['cf7tel_form_chats'] : array();
?>
<div class="cf7tel-main-wrapper">
    <?php
    if (isset($_GET['settings'])) {
        $query_settings = sanitize_text_field($_GET['settings']);
        if ($query_settings == 'save') {
            ?>
            <div class="notice notice-success wdgk-success-msg is-dismissible">
                <p><?php esc_html_e('Settings Saved!', 'connect-contact-form-7-to-telegram'); ?></p>
            </div>
            <?php
        }
    }
    ?>
    <div class="cf7tel-nav-tab-wrapper">
        <nav class="cf7tel-nav-tab">
            <ul>
                <li class="cf7tel-nav-tab-active">
                    <div class="cf7tel-nav-tab-progress-bar"></div>
                    <button class="cf7tel-nav-tab-btn" data-step="1">
                        <span class="cf7tel-nav-tab-btn-num">1</span>
                        <span class="cf7tel-nav-tab-btn-text"><?php esc_html_e('Telegram Info', 'connect-contact-form-7-to-telegram'); ?></span>
                    </button>
                </li>
                <li>
                    <div class="cf7tel-nav-tab-progress-bar"></div>
                    <button class="cf7tel-nav-tab-btn" data-step="2">
                        <span class="cf7tel-nav-tab-btn-num">2</span>
                        <span class="cf7tel-nav-tab-btn-text"><?php esc_html_e('Customize Form', 'connect-contact-form-7-to-telegram'); ?></span>
                    </button>
                </li>
                <li>
                    <div class="cf7tel-nav-tab-progress-bar"></div>
                    <button class="cf7tel-nav-tab-btn" data-step="3">
                        <span class="cf7tel-nav-tab-btn-num">3</span>
                        <span class="cf7tel-nav-tab-btn-text"><?php esc_html_e('Greetings', 'connect-contact-form-7-to-telegram'); ?></span>
                    </button>
                </li>
                <li>
                    <div class="cf7tel-nav-tab-progress-bar"></div>
                    <button class="cf7tel-nav-tab-btn" data-step="4">
                        <span class="cf7tel-nav-tab-btn-num">4</span>
                        <span class="cf7tel-nav-tab-btn-text"><?php esc_html_e('Triggers & Targeting', 'connect-contact-form-7-to-telegram'); ?></span>
                    </button>
                </li>
            </ul>
        </nav>
    </div>

    <div class="cf7tel_wrap">
        <div class="cf7tel_inner cf7tel_option_section">
            <form method="post" id="cf7tel_option_form">
                <?php wp_nonce_field('cf7tel_wpnonce'); ?>
                <div class="cf7tel-step-panel">
                    <div class="cf7tel-step-panel-inr">

                        <div class="cf7tel-step-panel-header">
                            <h2 class="cf7tel-step-label" data-step="1"><?php esc_html_e('Step 1: Telegram Info', 'connect-contact-form-7-to-telegram'); ?></h2>
                            <h2 class="cf7tel-step-label" data-step="2" style="display:none;"><?php esc_html_e('Step 2: Customize Form', 'connect-contact-form-7-to-telegram'); ?></h2>
                            <h2 class="cf7tel-step-label" data-step="3" style="display:none;"><?php esc_html_e('Step 3: Greetings', 'connect-contact-form-7-to-telegram'); ?></h2>
                            <h2 class="cf7tel-step-label" data-step="4" style="display:none;"><?php esc_html_e('Step 4: Triggers & Targeting', 'connect-contact-form-7-to-telegram'); ?></h2>
                            <div class="cf7tel-step-panel-pagination">
                                <button type="button" class="cf7tel-sec-btn cf7tel-prev-btn"><?php esc_html_e('Back', 'connect-contact-form-7-to-telegram'); ?></button>
                                <button type="button" class="cf7tel-sec-btn cf7tel-next-btn"><?php esc_html_e('Next', 'connect-contact-form-7-to-telegram'); ?></button>
                                <input class="cf7tel-sec-btn cf7tel-submit-btn" type="submit" name="cf7tel_save_changes" id="cf7tel_save_changes" style="display:none;" value="<?php esc_attr_e('Save Changes', 'connect-contact-form-7-to-telegram'); ?>" />
                            </div>
                        </div>

                        <div class="cf7tel-step-panel-body">
                            <div class="cf7tel-step" data-step="1">
                                <div class="cf7tel-row">
                                    <div class="cf7tel-col-lg-5">
                                        <div class="cf7tel-step-box">
                                            <div class="cf7tel-block-box">
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Select Telegram Chats', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <?php
                                                    if( isset($approved_chats) && !empty($approved_chats) ) {
                                                        
                                                        foreach( $approved_chats as $key => $chat ) {
                                                            $first_name = isset($chat['first_name']) ? sanitize_text_field($chat['first_name']) : '';
                                                            $last_name  = isset($chat['last_name']) ? sanitize_text_field($chat['last_name']) : '';
                                                            $fullname   = (!empty($first_name) && !empty($last_name)) ? $first_name .' '. $last_name : $first_name . $last_name;
                                                            $chat       = (!empty($chat)) ? array_map('sanitize_text_field', $chat) : [];
                                                            ?>                                    
                                                            <label for="<?php echo esc_attr( $chat['id'] ); ?>"><input class="cf7tel-required" type="checkbox" id="<?php echo esc_attr( $chat['id'] ); ?>" name="cf7tel_form_chats[]" value="<?php echo esc_attr( $chat['id'] ); ?>" <?php echo esc_attr( in_array( $chat['id'], $cf7_active_chats ) ? 'checked' : '' ); ?>><?php echo esc_html( implode( " ", array( empty( $str = trim( $chat['id'] > 0 ? $fullname : $chat['title'] ) ) ? "[{$chat['id']}]" : $str, empty( $chat['username'] ) ? '' : '@'. $chat['username'], isset( $chat['date'] ) ? wp_date( 'j F Y H:i:s', $chat['date'] ) : '' ) ) ); ?></label><br>
                                                            <?php
                                                        } ?>
                                                        <p><?php esc_html_e('Select any chats to send telegram messages.', 'connect-contact-form-7-to-telegram'); ?></p>
                                                        <?php
                                                    }else{ ?>
                                                            <p><?php esc_html_e('Please approve at least one chat in Subscribers list. To check subscriber list go to ', 'connect-contact-form-7-to-telegram'); ?><a target="_blank" href="<?php echo esc_url( admin_url('admin.php?page=cf7tel_telegram') ) ?>" title="<?php echo esc_attr( 'CF7 Telegram Settings', 'connect-contact-form-7-to-telegram' ); ?>"><?php echo esc_html( 'CF7 Telegram Settings', 'connect-contact-form-7-to-telegram' ); ?></a>.</p>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cf7tel-step" data-step="2">
                                <div class="cf7tel-row">
                                    <div class="cf7tel-col-lg-5">
                                        <div class="cf7tel-step-box">
                                            <div class="cf7tel-block-box">
                                                <h3><?php esc_html_e('Customize Icon', 'connect-contact-form-7-to-telegram'); ?></h3>

                                                <?php
                                                // Get the URL of the image using the attachment ID
                                                $cwci_file_url = plugin_dir_url(__FILE__) . 'assets/images/telegram.svg';
                                                ?>
                                                <div class="cf7tel-form-table cf7tel-form-pro-field">
                                                    <h4>
                                                        <?php esc_html_e('Custom Icon', 'connect-contact-form-7-to-telegram'); ?>
                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                    </h4>
                                                    <div class="cf7tel-file-upload">
                                                        <input type="text" id="cf7tel_customize_icon_url" name="chat_widget_custom_icon" value="" readonly />
                                                        <button type="button" id="cf7tel_customize_icon_upload" class="cf7tel-upload-button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                                            </svg>
                                                        </button>
                                                        <?php if ($cwci_file_url) : ?>
                                                            <div class="cf7tel-file-preview">
                                                                <img src="<?php echo esc_url($cwci_file_url); ?>" alt="Selected File" />
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="cf7tel_note">
                                                        <div class="cf7tel_note_icon">
                                                            <span class="mask_icon"></span>
                                                        </div>
                                                        <div class="cf7tel_note_content"><?php esc_html_e('Recommended size for custom icon : 64x64'); ?></div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Icon Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_icon_size_small" name="chat_widget_icon_size" value="small" <?php checked($options['customize_form']['chat_widget_icon_size'], "small"); ?>>
                                                            <label for="chat_widget_icon_size_small"><?php esc_html_e('Small', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_icon_size_medium" name="chat_widget_icon_size" value="medium" <?php checked($options['customize_form']['chat_widget_icon_size'], "medium"); ?>>
                                                            <label for="chat_widget_icon_size_medium"><?php esc_html_e('Medium', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_icon_size_large" name="chat_widget_icon_size" value="large" <?php checked($options['customize_form']['chat_widget_icon_size'], "large"); ?>>
                                                            <label for="chat_widget_icon_size_large"><?php esc_html_e('Large', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_icon_size_custom" name="chat_widget_icon_size" value="custom" data-group="chat_widget_icon_size_group" <?php checked($options['customize_form']['chat_widget_icon_size'], "custom"); ?>>
                                                            <label for="chat_widget_icon_size_custom"><?php esc_html_e('Custom', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="cf7tel-form-table chat_widget_icon_size_group <?php esc_attr_e($options['customize_form']['chat_widget_icon_size'] != "custom" ? 'cf7tel-hidden' : ''); ?>">
                                                        <h4><?php esc_html_e('Custom Icon Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                        <div class="cf7tel-input-range-wp">
                                                            <input type="range" class="cf7tel-input-range" id="chat_widget_icon_size_custom" name="chat_widget_icon_size_custom" min="10" max="300" value="<?php esc_attr_e($options['customize_form']['chat_widget_icon_size_custom']); ?>">
                                                            <span class="cf7tel-range-px"><?php esc_attr_e($options['customize_form']['chat_widget_icon_size_custom']); ?>px</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Icon Position', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_icon_position_left" name="chat_widget_icon_position" value="left" <?php checked($options['customize_form']['chat_widget_icon_position'], "left"); ?>>
                                                            <label for="chat_widget_icon_position_left"><?php esc_html_e('Left', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_icon_position_right" name="chat_widget_icon_position" value="right" <?php checked($options['customize_form']['chat_widget_icon_position'], "right"); ?>>
                                                            <label for="chat_widget_icon_position_right"><?php esc_html_e('Right', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box">
                                                <h3><?php esc_html_e('Call to action', 'connect-contact-form-7-to-telegram'); ?></h3>
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Enable Call to action', 'connect-contact-form-7-to-telegram'); ?>
                                                    </h4>
                                                    <label class="cf7tel-switch">
                                                        <input type="checkbox" class="cf7tel-switch-checkbox" name="chat_widget_cta_switch" value="on" data-group="chat_widget_cta_switch_group" <?php checked($options['customize_form']['chat_widget_cta_switch'], "on"); ?>>
                                                        <span class="cf7tel-switch-slider"></span>
                                                    </label>
                                                    <div class="cf7tel_note">
                                                        <div class="cf7tel_note_icon">
                                                            <span class="mask_icon"></span>
                                                        </div>
                                                        <div class="cf7tel_note_content">
                                                            <?php esc_html_e('This will enable Call to action on Chat Widget', 'connect-contact-form-7-to-telegram'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cf7tel-form-table chat_widget_cta_switch_group <?php esc_attr_e($options['customize_form']['chat_widget_cta_switch'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4><?php esc_html_e('Call to action text', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <input type="text" name="chat_widget_cta_text" class="cf7tel-field cf7tel-input" value="<?php esc_attr_e($options['customize_form']['chat_widget_cta_text']); ?>">
                                                    <div class="cf7tel_note">
                                                        <div class="cf7tel_note_icon">
                                                            <span class="mask_icon"></span>
                                                        </div>
                                                        <div class="cf7tel_note_content">
                                                            <?php esc_html_e('Leave blank to hide call to action text', 'connect-contact-form-7-to-telegram'); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table cf7tel-form-pro-field chat_widget_cta_switch_group <?php esc_attr_e($options['customize_form']['chat_widget_cta_switch'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4>
                                                        <?php esc_html_e('Call to action style', 'connect-contact-form-7-to-telegram'); ?>
                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                    </h4>
                                                    <div class="cf7tel-custom-color">
                                                        <div class="cf7tel-custom-color-box">
                                                            <label for="chat_widget_cta_text_background_text"><?php esc_html_e('Text Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input id="chat_widget_cta_text_background_text" type="text" name="chat_widget_cta_text_color" class="cf7tel_colorpicker" value="#555555">
                                                        </div>

                                                        <div class="cf7tel-custom-color-box">
                                                            <label for="chat_widget_cta_text_background_bg"><?php esc_html_e('Background Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input id="chat_widget_cta_text_background_bg" type="text" name="chat_widget_cta_text_background" class="cf7tel_colorpicker" value="#FFFFFF">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table chat_widget_cta_switch_group <?php esc_attr_e($options['customize_form']['chat_widget_cta_switch'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4><?php esc_html_e('Text size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_cta_text_size_small" name="chat_widget_cta_text_size" value="small" <?php checked($options['customize_form']['chat_widget_cta_text_size'], "small"); ?>>
                                                            <label for="chat_widget_cta_text_size_small"><?php esc_html_e('Small', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_cta_text_size_medium" name="chat_widget_cta_text_size" value="medium" <?php checked($options['customize_form']['chat_widget_cta_text_size'], "medium"); ?>>
                                                            <label for="chat_widget_cta_text_size_medium"><?php esc_html_e('Medium', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_cta_text_size_large" name="chat_widget_cta_text_size" value="large" <?php checked($options['customize_form']['chat_widget_cta_text_size'], "large"); ?>>
                                                            <label for="chat_widget_cta_text_size_large"><?php esc_html_e('Large', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="chat_widget_cta_text_size_custom" name="chat_widget_cta_text_size" value="custom" data-group="chat_widget_cta_text_size_group" <?php checked($options['customize_form']['chat_widget_cta_text_size'], "custom"); ?>>
                                                            <label for="chat_widget_cta_text_size_custom"><?php esc_html_e('Custom', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="cf7tel-form-table chat_widget_cta_switch_group chat_widget_cta_text_size_group <?php esc_attr_e(($options['customize_form']['chat_widget_cta_switch'] != "on" || ($options['customize_form']['chat_widget_cta_switch'] == "on" && $options['customize_form']['chat_widget_cta_text_size'] != "custom")) ? 'cf7tel-hidden' : ''); ?>">
                                                        <h4><?php esc_html_e('Custom Text Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                        <div class="cf7tel-input-range-wp">
                                                            <input type="range" id="form_size_custom" name="chat_widget_cta_text_size_custom" min="8" max="72" class="cf7tel-input-range" value="<?php esc_attr_e($options['customize_form']['chat_widget_cta_text_size_custom']); ?>">
                                                            <span class="cf7tel-range-px"><?php esc_attr_e($options['customize_form']['chat_widget_cta_text_size_custom']); ?>px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box">
                                                <h3><?php esc_html_e('Customize Form', 'connect-contact-form-7-to-telegram'); ?></h3>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Select Contact Form 7', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <select name="chat_widget_contact_form_7" id="chat_widget_contact_form_7" class="cf7tel-field cf7tel-select">
                                                        <?php
                                                        $cf7_posts = get_posts(array(
                                                            'post_type'     => 'wpcf7_contact_form',
                                                            'numberposts'   => -1
                                                        ));
                                                        foreach ($cf7_posts as $p) {
                                                            echo '<option value="' . $p->ID . '" ' . selected($options['customize_form']['chat_widget_contact_form_7'], $p->ID, false) . '>' . $p->post_title . ' (' . $p->ID . ')</option>';
                                                        } ?>
                                                    </select>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Form Title', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <input type="text" name="chat_widget_form_title" class="cf7tel-field cf7tel-input" value="<?php esc_attr_e($options['customize_form']['chat_widget_form_title']); ?>">
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Header Text', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <textarea name="chat_widget_header_text" rows="4" cols="100" placeholder="Header Text" class="cf7tel-field cf7tel-textarea"><?php echo esc_textarea($options['customize_form']['chat_widget_header_text']); ?></textarea>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Footer Text', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <textarea name="chat_widget_footer_text" rows="4" cols="100" placeholder="Footer Text" class="cf7tel-field cf7tel-textarea"><?php echo esc_textarea($options['customize_form']['chat_widget_footer_text']); ?></textarea>
                                                </div>

                                                <div class="cf7tel-form-table cf7tel-form-pro-field">
                                                    <h4>
                                                        <?php esc_html_e('Form Style', 'connect-contact-form-7-to-telegram'); ?>
                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                    </h4>
                                                    <div class="cf7tel-custom-color">
                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Text Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="chat_widget_form_style_text_color" class="cf7tel_colorpicker" value="#FFFFFF">
                                                        </div>

                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Background Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="chat_widget_form_style_background" class="cf7tel_colorpicker" value="#0097e1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Font Family', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <select name="chat_widget_form_font_family" id="chat_widget_form_font_family" class="cf7tel-field cf7tel-select">
                                                        <?php
                                                        $font_families = array(
                                                            'Rubik' => 'Default',
                                                            'Playfair Display' => 'Playfair Display',
                                                            'Poppins' => 'Poppins'
                                                        );
                                                        foreach ($font_families as $key => $font) {
                                                            echo '<option value="' . $key . '" ' . selected($options['customize_form']['chat_widget_form_font_family'], $key, false) . '>' . $font . '</option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box">
                                                <h3><?php esc_html_e('Form Behavior', 'connect-contact-form-7-to-telegram'); ?></h3>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Open by default', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <label class="cf7tel-switch">
                                                        <input type="checkbox" class="cf7tel-switch-checkbox" name="chat_widget_form_behaviour_open_by_default" value="on" <?php checked($options['customize_form']['chat_widget_form_behaviour_open_by_default'], "on"); ?>>
                                                        <span class="cf7tel-switch-slider"></span>
                                                    </label>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Close on Submit', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <label class="cf7tel-switch">
                                                        <input type="checkbox" class="cf7tel-switch-checkbox" name="chat_widget_form_behaviour_close_on_submit" value="on" <?php checked($options['customize_form']['chat_widget_form_behaviour_close_on_submit'], "on"); ?>>
                                                        <span class="cf7tel-switch-slider"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cf7tel-step" data-step="3">
                                <div class="cf7tel-row">
                                    <div class="cf7tel-col-lg-5">
                                        <div class="cf7tel-step-box">

                                            <div class="cf7tel-block-box">
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Display Greeting Popup', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <label class="cf7tel-switch">
                                                        <input type="checkbox" class="cf7tel-switch-checkbox" name="display_greeting_popup" value="on" data-group="display_greeting_popup_group" <?php checked($options['greetings']['display_greeting_popup'], "on"); ?>>
                                                        <span class="cf7tel-switch-slider"></span>
                                                    </label>
                                                </div>

                                                <div class="cf7tel-form-table display_greeting_popup_group <?php esc_attr_e($options['greetings']['display_greeting_popup'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4><?php esc_html_e('Choose Greetings Template', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <label for="choose_greetings_template_simple" class="cf7tel-image-radio cf7tel-image-radio-lg">
                                                                <input type="radio" id="choose_greetings_template_simple" name="choose_greetings_template" data-group="choose_greetings_template_simple_group" value="simple" <?php checked($options['greetings']['choose_greetings_template'], "simple"); ?>>
                                                                <span class="cf7tel-image-radio-inr">
                                                                    <span class="cf7tel-image-radio-image">
                                                                        <img height="50" width="50" src="<?php echo esc_url(plugins_url('admin/assets/images/greeting-template-simple.png', __DIR__)); ?>" alt="Greeting Template Simple">
                                                                    </span>
                                                                    <span><?php esc_html_e('Simple', 'connect-contact-form-7-to-telegram'); ?></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <label for="choose_greetings_template_wave" class="cf7tel-image-radio cf7tel-image-radio-lg">
                                                                <input type="radio" id="choose_greetings_template_wave" name="choose_greetings_template" data-group="choose_greetings_template_wave_group" value="wave" <?php checked($options['greetings']['choose_greetings_template'], "wave"); ?>>
                                                                <span class="cf7tel-image-radio-inr">
                                                                    <span class="cf7tel-image-radio-image">
                                                                        <img height="50" width="50" src="<?php echo esc_url(plugins_url('admin/assets/images/greeting-template-wave.png', __DIR__)); ?>" alt="Greeting Template Simple">
                                                                    </span>
                                                                    <span><?php esc_html_e('Wave', 'connect-contact-form-7-to-telegram'); ?></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="cf7tel-form-table display_greeting_popup_group choose_greetings_template_simple_group <?php esc_attr_e($options['greetings']['choose_greetings_template'] != "simple" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4><?php esc_html_e('Select Template Style', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <label for="choose_simple_greetings_template_type_style_1" class="cf7tel-image-radio">
                                                                <input type="radio" id="choose_simple_greetings_template_type_style_1" name="choose_simple_greetings_template_type" value="choose_simple_greetings_template_type_style_1" <?php checked($options['greetings']['choose_simple_greetings_template_type'], "choose_simple_greetings_template_type_style_1"); ?>>
                                                                <span class="cf7tel-image-radio-inr">
                                                                    <span class="cf7tel-image-radio-image">
                                                                        <img height="50" width="50" src="<?php echo esc_url(plugins_url('admin/assets/images/greeting-template-simple.png', __DIR__)); ?>" alt="Greeting Template Simple"></span>
                                                                    <span><?php esc_html_e('Style 1', 'connect-contact-form-7-to-telegram'); ?></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <label for="choose_simple_greetings_template_type_style_2" class="cf7tel-image-radio cf7tel-form-pro-field">
                                                                <input height="50" width="50" type="radio" id="choose_simple_greetings_template_type_style_2" name="choose_simple_greetings_template_type" value="choose_simple_greetings_template_type_style_2" <?php checked($options['greetings']['choose_simple_greetings_template_type'], "choose_simple_greetings_template_type_style_2"); ?>>
                                                                <span class="cf7tel-image-radio-inr">
                                                                    <span class="cf7tel-image-radio-image">
                                                                        <img height="50" width="50" src="<?php echo esc_url(plugins_url('admin/assets/images/greeting-template-simple-2.png', __DIR__)); ?>" alt="Greeting Template Simple">
                                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                                    </span>
                                                                    <span><?php esc_html_e('Style 2', 'connect-contact-form-7-to-telegram'); ?></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table display_greeting_popup_group choose_greetings_template_wave_group <?php esc_attr_e($options['greetings']['choose_greetings_template'] != "wave" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4><?php esc_html_e('Select Template Style', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <label for="choose_wave_greetings_template_type_style_1" class="cf7tel-image-radio">
                                                                <input type="radio" id="choose_wave_greetings_template_type_style_1" name="choose_wave_greetings_template_type" data-group="choose_wave_greetings_template_type_style_1_group" value="choose_wave_greetings_template_type_style_1" <?php checked($options['greetings']['choose_wave_greetings_template_type'], "choose_wave_greetings_template_type_style_1"); ?>>
                                                                <span class="cf7tel-image-radio-inr">
                                                                    <span class="cf7tel-image-radio-image">
                                                                        <img height="50" width="50" src="<?php echo esc_url(plugins_url('admin/assets/images/greeting-template-wave.png', __DIR__)); ?>" alt="Greeting Template Wave">
                                                                    </span>
                                                                    <span><?php esc_html_e('Style 1', 'connect-contact-form-7-to-telegram'); ?></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <label for="choose_wave_greetings_template_type_style_2" class="cf7tel-image-radio cf7tel-form-pro-field">
                                                                <input type="radio" id="choose_wave_greetings_template_type_style_2" name="choose_wave_greetings_template_type" data-group="choose_wave_greetings_template_type_style_2_group" value="choose_wave_greetings_template_type_style_2" <?php checked($options['greetings']['choose_wave_greetings_template_type'], "choose_wave_greetings_template_type_style_2"); ?>>
                                                                <span class="cf7tel-image-radio-inr">
                                                                    <span class="cf7tel-image-radio-image">
                                                                        <img height="50" width="50" src="<?php echo esc_url(plugins_url('admin/assets/images/greeting-template-wave-2.png', __DIR__)); ?>" alt="Greeting Template Wave 2">
                                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                                    </span>
                                                                    <span><?php esc_html_e('Style 2', 'connect-contact-form-7-to-telegram'); ?></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="display_greeting_popup_group <?php esc_attr_e($options['greetings']['display_greeting_popup'] != "on" ? 'cf7tel-hidden' : ''); ?>"><?php esc_html_e('Customize Greetings', 'connect-contact-form-7-to-telegram'); ?></h3>

                                            <div class="cf7tel-block-box display_greeting_popup_group choose_greetings_template_simple_group <?php esc_attr_e($options['greetings']['choose_greetings_template'] != "simple" ? 'cf7tel-hidden' : ''); ?>">
                                                <!-- Simple Greeting -> Style 1 / 2 -> Customize Greetings  -->
                                                <div class="cf7tel-form-table <?php esc_attr_e($options['greetings']['choose_greetings_template'] != "simple" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4><?php esc_html_e('Greeting Heading', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <input type="text" name="simple_greetings_heading" value="<?php esc_attr_e($options['greetings']['simple_greetings_heading']); ?>" class="cf7tel-field cf7tel-input">
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Heading Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="simple_greetings_heading_size_small" name="simple_greetings_heading_size" value="small" <?php checked($options['greetings']['simple_greetings_heading_size'], "small"); ?>>
                                                            <label for="simple_greetings_heading_size_small"><?php esc_html_e('Small', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="simple_greetings_heading_size_medium" name="simple_greetings_heading_size" value="medium" <?php checked($options['greetings']['simple_greetings_heading_size'], "medium"); ?>>
                                                            <label for="simple_greetings_heading_size_medium"><?php esc_html_e('Medium', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="simple_greetings_heading_size_large" name="simple_greetings_heading_size" value="large" <?php checked($options['greetings']['simple_greetings_heading_size'], "large"); ?>>
                                                            <label for="simple_greetings_heading_size_large"><?php esc_html_e('Large', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="simple_greetings_heading_size_custom" name="simple_greetings_heading_size" data-group="simple_greetings_heading_size_group" value="custom" <?php checked($options['greetings']['simple_greetings_heading_size'], "custom"); ?>>
                                                            <label for="simple_greetings_heading_size_custom"><?php esc_html_e('Custom', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="cf7tel-form-table simple_greetings_heading_size_group <?php esc_attr_e($options['greetings']['simple_greetings_heading_size'] != "custom" ? 'cf7tel-hidden' : ''); ?>">
                                                        <h4><?php esc_html_e('Custom Heading Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                        <div class="cf7tel-input-range-wp">
                                                            <input type="range" id="simple_greetings_heading_custom_size" name="simple_greetings_heading_custom_size" min="6" max="150" class="cf7tel-input-range" value="<?php esc_attr_e($options['greetings']['simple_greetings_heading_custom_size']); ?>">
                                                            <span class="cf7tel-range-px"><?php esc_attr_e($options['greetings']['simple_greetings_heading_custom_size']); ?>px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box display_greeting_popup_group choose_greetings_template_simple_group <?php esc_attr_e($options['greetings']['choose_greetings_template'] != "simple" ? 'cf7tel-hidden' : ''); ?>">
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Greeting Message', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <textarea name="simple_greetings_message" class="cf7tel-field cf7tel-textarea" rows="4" cols="100" placeholder="Hi! Have any queries?"><?php echo esc_textarea($options['greetings']['simple_greetings_message']); ?></textarea>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Message Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="simple_greetings_message_size_small" name="simple_greetings_message_size" value="small" <?php checked($options['greetings']['simple_greetings_message_size'], "small"); ?>>
                                                            <label for="simple_greetings_message_size_small"><?php esc_html_e('Small', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="simple_greetings_message_size_medium" name="simple_greetings_message_size" value="medium" <?php checked($options['greetings']['simple_greetings_message_size'], "medium"); ?>>
                                                            <label for="simple_greetings_message_size_medium"><?php esc_html_e('Medium', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="simple_greetings_message_size_large" name="simple_greetings_message_size" value="large" <?php checked($options['greetings']['simple_greetings_message_size'], "large"); ?>>
                                                            <label for="simple_greetings_message_size_large"><?php esc_html_e('Large', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="simple_greetings_message_size_custom" name="simple_greetings_message_size" data-group="simple_greetings_message_size_group" value="custom" data-group="simple_greetings_message_size_group" <?php checked($options['greetings']['simple_greetings_message_size'], "custom"); ?>>
                                                            <label for="simple_greetings_message_size_custom"><?php esc_html_e('Custom', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="cf7tel-form-table simple_greetings_message_size_group <?php esc_attr_e($options['greetings']['simple_greetings_message_size'] != "custom" ? 'cf7tel-hidden' : ''); ?>">
                                                        <h4><?php esc_html_e('Custom Message Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                        <div class="cf7tel-input-range-wp">
                                                            <input type="range" id="simple_greetings_message_custom_size" name="simple_greetings_message_custom_size" min="6" max="150" class="cf7tel-input-range" value="<?php esc_attr_e($options['greetings']['simple_greetings_message_custom_size']); ?>">
                                                            <span class="cf7tel-range-px"><?php esc_attr_e($options['greetings']['simple_greetings_message_custom_size']); ?>px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Simple Greeting -> Style 1 / 2 -> Customize Greetings -->


                                            <!-- Wave Greeting -> Style 1 / 2 -> Customize Greetings  -->
                                            <div class="cf7tel-block-box display_greeting_popup_group choose_greetings_template_wave_group <?php esc_attr_e($options['greetings']['choose_greetings_template'] != "wave" ? 'cf7tel-hidden' : ''); ?>">
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Show Main Content', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <label class="cf7tel-switch">
                                                        <input type="checkbox" class="cf7tel-switch-checkbox" name="wave_greetings_show_main_content" data-group="wave_greetings_show_main_content" value="on" <?php checked($options['greetings']['wave_greetings_show_main_content'], "on"); ?>>
                                                        <span class="cf7tel-switch-slider"></span>
                                                    </label>
                                                </div>

                                                <?php
                                                // Get the existing attachment ID (if any)
                                                $wgs1ci_attachment_id = (isset($options['greetings']['wave_greetings_style_1_custom_icon']) && !empty($options['greetings']['wave_greetings_style_1_custom_icon'])) ? $options['greetings']['wave_greetings_style_1_custom_icon'] : '';

                                                // Get the URL of the image using the attachment ID
                                                $wgs1ci_file_url = plugin_dir_url(__FILE__) . 'assets/images/hand-wave.svg';
                                                ?>

                                                <div class="cf7tel-form-table cf7tel-form-pro-field wave_greetings_show_main_content <?php esc_attr_e($options['greetings']['wave_greetings_show_main_content'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4>
                                                        <?php esc_html_e('Custom Wave Icon', 'connect-contact-form-7-to-telegram'); ?>
                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                    </h4>
                                                    <div class="cf7tel-file-upload">
                                                        <input type="text" id="cf7tel_customize_icon_url" name="wave_greetings_style_1_custom_icon" value="<?php esc_attr_e($wgs1ci_attachment_id); ?>" readonly />
                                                        <button type="button" class="cf7tel-upload-button" id="cf7tel_customize_icon_upload">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                                            </svg>
                                                        </button>
                                                        <?php if ($wgs1ci_file_url) : ?>
                                                            <div class="cf7tel-file-preview">
                                                                <img src="<?php echo esc_url($wgs1ci_file_url); ?>" alt="Selected File" />
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="cf7tel_note">
                                                        <div class="cf7tel_note_icon">
                                                            <span class="mask_icon"></span>
                                                        </div>
                                                        <div class="cf7tel_note_content">
                                                            <?php esc_html_e('Recommended size for custom icon : 64x64'); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table wave_greetings_show_main_content choose_wave_greetings_template_type_style_1_group <?php esc_attr_e($options['greetings']['choose_wave_greetings_template_type'] != "choose_wave_greetings_template_type_style_1" || $options['greetings']['wave_greetings_show_main_content'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4><?php esc_html_e('Position', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="before_heading" name="wave_greetings_style_1_icon_position" value="before_heading" <?php checked($options['greetings']['wave_greetings_style_1_icon_position'], "before_heading"); ?>>
                                                            <label for="before_heading"><?php esc_html_e('Before Heading', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="after_heading" name="wave_greetings_style_1_icon_position" value="after_heading" <?php checked($options['greetings']['wave_greetings_style_1_icon_position'], "after_heading"); ?>>
                                                            <label for="after_heading"><?php esc_html_e('After Heading', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="after_message" name="wave_greetings_style_1_icon_position" value="after_message" <?php checked($options['greetings']['wave_greetings_style_1_icon_position'], "after_message"); ?>>
                                                            <label for="after_message"><?php esc_html_e('After Message', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box display_greeting_popup_group choose_greetings_template_wave_group choose_wave_greetings_template_type_style_1_group <?php esc_attr_e($options['greetings']['choose_greetings_template'] != "wave" ? 'cf7tel-hidden' : ''); ?>">
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Greeting Heading', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <input type="text" name="wave_greetings_style_1_greeting_heading" value="<?php esc_attr_e($options['greetings']['wave_greetings_style_1_greeting_heading']); ?>" class="cf7tel-field cf7tel-input">
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Heading Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="wave_greetings_style_1_heading_size_small" name="wave_greetings_style_1_heading_size" value="small" <?php checked($options['greetings']['wave_greetings_style_1_heading_size'], "small"); ?>>
                                                            <label for="wave_greetings_style_1_heading_size_small"><?php esc_html_e('Small', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="wave_greetings_style_1_heading_size_medium" name="wave_greetings_style_1_heading_size" value="medium" <?php checked($options['greetings']['wave_greetings_style_1_heading_size'], "medium"); ?>>
                                                            <label for="wave_greetings_style_1_heading_size_medium"><?php esc_html_e('Medium', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="wave_greetings_style_1_heading_size_large" name="wave_greetings_style_1_heading_size" value="large" <?php checked($options['greetings']['wave_greetings_style_1_heading_size'], "large"); ?>>
                                                            <label for="wave_greetings_style_1_heading_size_large"><?php esc_html_e('Large', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="wave_greetings_style_1_heading_size_custom" name="wave_greetings_style_1_heading_size" data-group="wave_greetings_style_1_heading_size_group" value="custom" <?php checked($options['greetings']['wave_greetings_style_1_heading_size'], "custom"); ?>>
                                                            <label for="wave_greetings_style_1_heading_size_custom"><?php esc_html_e('Custom', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="cf7tel-form-table wave_greetings_style_1_heading_size_group <?php esc_attr_e($options['greetings']['wave_greetings_style_1_heading_size'] != "custom" ? 'cf7tel-hidden' : ''); ?>">
                                                        <h4><?php esc_html_e('Custom Heading Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                        <div class="cf7tel-input-range-wp">
                                                            <input type="range" id="wave_greetings_style_1_heading_custom_size" name="wave_greetings_style_1_heading_custom_size" min="10" max="150" class="cf7tel-input-range" value="<?php esc_attr_e($options['greetings']['wave_greetings_style_1_heading_custom_size']); ?>">
                                                            <span class="cf7tel-range-px"><?php esc_attr_e($options['greetings']['wave_greetings_style_1_heading_custom_size']); ?>px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box display_greeting_popup_group choose_greetings_template_wave_group choose_wave_greetings_template_type_style_1_group <?php esc_attr_e($options['greetings']['choose_greetings_template'] != "wave" ? 'cf7tel-hidden' : ''); ?>">
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Greeting Message', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <textarea name="wave_greetings_style_1_message" rows="4" cols="100" placeholder="Hi! Have any queries?" class="cf7tel-field cf7tel-textarea"><?php echo esc_textarea($options['greetings']['wave_greetings_style_1_message']); ?></textarea>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Message Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="wave_greetings_style_1_message_size_small" name="wave_greetings_style_1_message_size" value="small" <?php checked($options['greetings']['wave_greetings_style_1_message_size'], "small"); ?>>
                                                            <label for="wave_greetings_style_1_message_size_small"><?php esc_html_e('Small', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="wave_greetings_style_1_message_size_medium" name="wave_greetings_style_1_message_size" value="medium" <?php checked($options['greetings']['wave_greetings_style_1_message_size'], "medium"); ?>>
                                                            <label for="wave_greetings_style_1_message_size_medium"><?php esc_html_e('Medium', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="wave_greetings_style_1_message_size_large" name="wave_greetings_style_1_message_size" value="large" <?php checked($options['greetings']['wave_greetings_style_1_message_size'], "large"); ?>>
                                                            <label for="wave_greetings_style_1_message_size_large"><?php esc_html_e('Large', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="wave_greetings_style_1_message_size_custom" name="wave_greetings_style_1_message_size" data-group="wave_greetings_style_1_message_size_group" value="custom" <?php checked($options['greetings']['wave_greetings_style_1_message_size'], "custom"); ?>>
                                                            <label for="wave_greetings_style_1_message_size_custom"><?php esc_html_e('custom', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="cf7tel-form-table wave_greetings_style_1_message_size_group <?php esc_attr_e($options['greetings']['wave_greetings_style_1_message_size'] != "custom" ? 'cf7tel-hidden' : ''); ?>">
                                                        <h4><?php esc_html_e('Custom Message Size', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                        <div class="cf7tel-input-range-wp">
                                                            <input type="range" id="wave_greetings_style_1_message_custom_size" name="wave_greetings_style_1_message_custom_size" min="6" max="150" class="cf7tel-input-range" value="<?php esc_attr_e($options['greetings']['wave_greetings_style_1_message_custom_size']); ?>">
                                                            <span class="cf7tel-range-px"><?php esc_attr_e($options['greetings']['wave_greetings_style_1_message_custom_size']); ?>px</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box cf7tel-form-pro-field display_greeting_popup_group choose_greetings_template_simple_group <?php esc_attr_e($options['greetings']['choose_greetings_template'] != "simple" ? 'cf7tel-hidden' : ''); ?>">
                                                <div class="cf7tel-form-table">
                                                    <h4>
                                                        <?php esc_html_e('Greeting Colors', 'connect-contact-form-7-to-telegram'); ?>
                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                    </h4>
                                                    <div class="cf7tel-custom-color">
                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Heading Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="simple_greetings_style_1_heading_color" class="cf7tel_colorpicker" value="#828282">
                                                        </div>

                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Message Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="simple_greetings_style_1_message_color" class="cf7tel_colorpicker" value="#4F4F4F">
                                                        </div>

                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Background Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="simple_greetings_style_1_background_color" class="cf7tel_colorpicker" value="#FFFFFF">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Greeting Font Family', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <select name="simple_greetings_style_1_font_family" class="cf7tel-field cf7tel-select">
                                                        <?php
                                                        $font_families = array(
                                                            'Rubik' => 'Default',
                                                            'Playfair Display' => 'Playfair Display',
                                                            'Poppins' => 'Poppins'
                                                        );
                                                        foreach ($font_families as $key => $font) {
                                                            echo '<option value="' . $key . '" ' . selected($options['greetings']['simple_greetings_style_1_font_family'], $key, false) . '>' . $font . '</option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box display_greeting_popup_group choose_greetings_template_wave_group choose_wave_greetings_template_type_style_1_group <?php esc_attr_e(($options['greetings']['choose_greetings_template'] != "wave" || ($options['greetings']['choose_greetings_template'] == "wave" && $options['greetings']['choose_wave_greetings_template_type'] != "choose_wave_greetings_template_type_style_1")) ? 'cf7tel-hidden' : ''); ?>">
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Show Greetings CTA', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <label class="cf7tel-switch">
                                                        <input type="checkbox" class="cf7tel-switch-checkbox" name="wave_greetings_style_1_show_greeting_cta" data-group="wave_greetings_style_1_show_greeting_cta" value="on" <?php checked($options['greetings']['wave_greetings_style_1_show_greeting_cta'], "on"); ?>>
                                                        <span class="cf7tel-switch-slider"></span>
                                                    </label>
                                                </div>

                                                <div class="cf7tel-form-table wave_greetings_style_1_show_greeting_cta <?php esc_attr_e($options['greetings']['wave_greetings_style_1_show_greeting_cta'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4><?php esc_html_e('Greeting CTA Text', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <textarea name="wave_greetings_style_1_greeting_cta_text" class="cf7tel-field cf7tel-textarea" rows="4" placeholder="Message Format"><?php echo esc_textarea($options['greetings']['wave_greetings_style_1_greeting_cta_text']); ?></textarea>
                                                </div>

                                                <?php
                                                // Get the URL of the image using the attachment ID
                                                $wgs1ci_file_url = plugin_dir_url(__FILE__) . 'assets/images/greeting-cta-chat-icon.svg';
                                                ?>
                                                <div class="cf7tel-form-table cf7tel-form-pro-field wave_greetings_style_1_show_greeting_cta <?php esc_attr_e($options['greetings']['wave_greetings_style_1_show_greeting_cta'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4>
                                                        <?php esc_html_e('Custom Icon', 'connect-contact-form-7-to-telegram'); ?>
                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                    </h4>
                                                    <div class="cf7tel-file-upload">
                                                        <input type="text" id="cf7tel_customize_icon_url" name="wave_greetings_style_1_cta_icon" value="" readonly />
                                                        <button type="button" id="cf7tel_customize_icon_upload" class="cf7tel-upload-button">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                                            </svg>
                                                        </button>
                                                        <?php if ($wgs1ci_file_url) : ?>
                                                            <div class="cf7tel-file-preview">
                                                                <img src="<?php echo esc_url($wgs1ci_file_url); ?>" alt="Selected File" />
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="cf7tel_note">
                                                        <div class="cf7tel_note_icon">
                                                            <span class="mask_icon"></span>
                                                        </div>
                                                        <div class="cf7tel_note_content"><?php esc_html_e('Recommended size for custom icon : 64x64', 'connect-contact-form-7-to-telegram'); ?></div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table cf7tel-form-pro-field wave_greetings_style_1_show_greeting_cta <?php esc_attr_e($options['greetings']['wave_greetings_style_1_show_greeting_cta'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                    <h4>
                                                        <?php esc_html_e('CTA Style', 'connect-contact-form-7-to-telegram'); ?>
                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                    </h4>
                                                    <div class="cf7tel-custom-color">
                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Text Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="wave_greetings_style_1_cta_text_color" class="cf7tel_colorpicker" value="#6952b0">
                                                        </div>

                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Background Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="wave_greetings_style_1_cta_background" class="cf7tel_colorpicker" value="#F5F7F8">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box cf7tel-form-pro-field display_greeting_popup_group choose_greetings_template_wave_group choose_wave_greetings_template_type_style_1_group <?php esc_attr_e(($options['greetings']['choose_greetings_template'] != "wave" || ($options['greetings']['choose_greetings_template'] == "wave" && $options['greetings']['choose_wave_greetings_template_type'] != "choose_wave_greetings_template_type_style_1")) ? 'cf7tel-hidden' : ''); ?>">
                                                <div class="cf7tel-form-table">
                                                    <h4>
                                                        <?php esc_html_e('Greeting Colors', 'connect-contact-form-7-to-telegram'); ?>
                                                        <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                    </h4>
                                                    <div class="cf7tel-custom-color">
                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Heading Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="wave_greetings_style_1_heading_color" class="cf7tel_colorpicker" value="#828282">
                                                        </div>

                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Message Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="wave_greetings_style_1_message_color" class="cf7tel_colorpicker" value="#828282">
                                                        </div>

                                                        <div class="cf7tel-custom-color-box">
                                                            <label><?php esc_html_e('Background Color', 'connect-contact-form-7-to-telegram'); ?></label>
                                                            <input type="text" name="wave_greetings_style_1_background_color" class="cf7tel_colorpicker" value="#ffffff">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Greeting Font Family', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <select name="wave_greetings_style_1_font_family" class="cf7tel-field cf7tel-select">
                                                        <?php
                                                        $font_families = array(
                                                            'Rubik' => 'Default',
                                                            'Playfair Display' => 'Playfair Display',
                                                            'Poppins' => 'Poppins'
                                                        );
                                                        foreach ($font_families as $key => $font) {
                                                            echo '<option value="' . $key . '" ' . selected($options['greetings']['wave_greetings_style_1_font_family'], $key, false) . '>' . $font . '</option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <h3 class="display_greeting_popup_group <?php esc_attr_e($options['greetings']['display_greeting_popup'] != "on" ? 'cf7tel-hidden' : ''); ?>"><?php esc_html_e('Greeting Behavior', 'connect-contact-form-7-to-telegram'); ?></h3>

                                            <div class="cf7tel-block-box display_greeting_popup_group <?php esc_attr_e($options['greetings']['display_greeting_popup'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('On Click Action', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <div class="cf7tel-field-group-wp">
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="load_the_selected_form" name="greeting_behavior_on_click_action" value="load_the_selected_form" <?php checked($options['greetings']['greeting_behavior_on_click_action'], "load_the_selected_form"); ?>>
                                                            <label for="load_the_selected_form"><?php esc_html_e('Load the Selected Form', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                        <div class="cf7tel-field-group">
                                                            <input type="radio" id="redirected_to_telegram_directly" name="greeting_behavior_on_click_action" value="redirected_to_telegram_directly" <?php checked($options['greetings']['greeting_behavior_on_click_action'], "redirected_to_telegram_directly"); ?>>
                                                            <label for="redirected_to_telegram_directly"><?php esc_html_e('Redirected to telegram directly', 'connect-contact-form-7-to-telegram'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cf7tel-step" data-step="4">
                                <div class="cf7tel-row">
                                    <div class="cf7tel-col-lg-5">
                                        <div class="cf7tel-step-box">
                                            <div class="cf7tel-block-box">
                                                <h3><?php esc_html_e('Triggers', 'connect-contact-form-7-to-telegram'); ?></h3>
                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Activate Contact Form Chat Widget', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <label class="cf7tel-switch">
                                                        <input type="checkbox" class="cf7tel-switch-checkbox" name="triggers_activate_cf7_form_chat_widget" value="on" <?php checked($options['triggers-targeting']['triggers_activate_cf7_form_chat_widget'], "on"); ?>>
                                                        <span class="cf7tel-switch-slider"></span>
                                                    </label>
                                                </div>

                                                <div class="cf7tel-form-table">
                                                    <h4><?php esc_html_e('Time delay', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <label class="cf7tel-switch">
                                                        <input type="checkbox" class="cf7tel-switch-checkbox" name="triggers_time_delay" data-group="triggers_time_delay_group" value="on" <?php checked($options['triggers-targeting']['triggers_time_delay'], "on"); ?>>
                                                        <span class="cf7tel-switch-slider"></span>
                                                    </label>

                                                    <div class="cf7tel-form-table triggers_time_delay_group <?php esc_attr_e($options['triggers-targeting']['triggers_time_delay'] != "on" ? 'cf7tel-hidden' : ''); ?>">
                                                        <div class="cf7tel-input-center-box">
                                                            <label for="form_delay" class="cf7tel-text-small">Show form after</label>
                                                            <input id="form_delay" name="triggers_show_form_after_second" type="number" min="0" step="1" class="cf7tel-field cf7tel-input cf7tel-field-auto" placeholder="0" value="<?php esc_attr_e($options['triggers-targeting']['triggers_show_form_after_second']); ?>">
                                                            <span class="cf7tel-text-small">seconds when page is loaded</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="cf7tel-block-box cf7tel-targets">
                                                <h3>
                                                    <?php esc_html_e('Targets', 'connect-contact-form-7-to-telegram'); ?>
                                                    <a target="_blank" class="cf7tel-pro-label" href="https://geekcodelab.com/wordpress-plugins/connect-contact-form-7-to-telegram-pro/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 22q-.825 0-1.412-.587T4 20V10q0-.825.588-1.412T6 8h1V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h1q.825 0 1.413.588T20 10v10q0 .825-.587 1.413T18 22zm6-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>Pro</a>
                                                </h3>

                                                <div class="cf7tel-form-table cf7tel-exclude-pages cf7tel-form-pro-field">
                                                    <h4><?php esc_html_e('Exclude pages', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <select name="targeting_exclude_pages[]" id="targeting_exclude_pages" class="cf7tel-field cf7tel-select" multiple>
                                                        <?php
                                                        $pages = get_pages();
                                                        foreach ($pages as $p) {
                                                            echo '<option value="' . $p->ID . '" ' . selected(in_array($p->ID, $options['triggers-targeting']['targeting_exclude_pages']), true, false) . '>' . $p->post_title . ' (' . $p->ID . ')</option>';
                                                        } ?>
                                                    </select>
                                                </div>

                                                <div class="cf7tel-form-table cf7tel-form-pro-field">
                                                    <h4><?php esc_html_e('Exclude all except', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <label class="cf7tel-switch">
                                                        <input type="checkbox" class="cf7tel-switch-checkbox" name="targeting_exclude_all_except_switch" id="targeting_exclude_all_except_switch" value="on" <?php checked($options['triggers-targeting']['targeting_exclude_all_except_switch'], "on"); ?>>
                                                        <span class="cf7tel-switch-slider"></span>
                                                    </label>
                                                </div>

                                                <div class="cf7tel-form-table cf7tel-exclude-all-except cf7tel-form-pro-field">
                                                    <h4><?php esc_html_e('Exclude all except selected', 'connect-contact-form-7-to-telegram'); ?></h4>
                                                    <select name="targeting_exclude_all_except_pages[]" id="targeting_exclude_all_except_pages" class="cf7tel-field cf7tel-select" multiple>
                                                        <?php
                                                        $except_pages = get_pages();
                                                        foreach ($except_pages as $p) {
                                                            echo '<option value="' . $p->ID . '" ' . selected(in_array($p->ID, $options['triggers-targeting']['targeting_exclude_all_except_pages']), true, false) . '>' . $p->post_title . ' (' . $p->ID . ')</option>';
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cf7tel-step-panel-footer" style="display:none;">
                            <input class="cf7tel-sec-btn cf7tel_submit" type="submit" name="cf7tel_save_changes" id="cf7tel_save_changes" value="<?php esc_attr_e('Save Changes', 'connect-contact-form-7-to-telegram'); ?>" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>