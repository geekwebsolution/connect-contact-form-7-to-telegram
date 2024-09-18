<?php
$defaults = cf7tel_defaults();
$cf7tel_options = get_option('cf7tel_options');

// Customize Icon - Sticky Widget
$chat_widget_icon_position = (isset($cf7tel_options['customize_form']['chat_widget_icon_position'])) ? $cf7tel_options['customize_form']['chat_widget_icon_position'] : $defaults['customize_form']['chat_widget_icon_position'];

// Call to action - Sticky Widget
$chat_widget_cta_switch = (isset($cf7tel_options['customize_form']['chat_widget_cta_switch'])) ? $cf7tel_options['customize_form']['chat_widget_cta_switch'] : $defaults['customize_form']['chat_widget_cta_switch'];
$chat_widget_cta_text = (isset($cf7tel_options['customize_form']['chat_widget_cta_text'])) ? $cf7tel_options['customize_form']['chat_widget_cta_text'] : $defaults['customize_form']['chat_widget_cta_text'];

// Customize Form - Sticky Form
$chat_widget_contact_form_7 = (isset($cf7tel_options['customize_form']['chat_widget_contact_form_7'])) ? $cf7tel_options['customize_form']['chat_widget_contact_form_7'] : $defaults['customize_form']['chat_widget_contact_form_7'];
$chat_widget_form_title = (isset($cf7tel_options['customize_form']['chat_widget_form_title'])) ? $cf7tel_options['customize_form']['chat_widget_form_title'] : $defaults['customize_form']['chat_widget_form_title'];
$chat_widget_header_text = (isset($cf7tel_options['customize_form']['chat_widget_header_text'])) ? $cf7tel_options['customize_form']['chat_widget_header_text'] : $defaults['customize_form']['chat_widget_header_text'];
$chat_widget_footer_text = (isset($cf7tel_options['customize_form']['chat_widget_footer_text'])) ? $cf7tel_options['customize_form']['chat_widget_footer_text'] : $defaults['customize_form']['chat_widget_footer_text'];

// Form Behavior
$form_open_by_default = (isset($cf7tel_options['customize_form']['chat_widget_form_behaviour_open_by_default'])) ? $cf7tel_options['customize_form']['chat_widget_form_behaviour_open_by_default'] : $defaults['customize_form']['chat_widget_form_behaviour_open_by_default'];
$form_close_on_submit = (isset($cf7tel_options['customize_form']['chat_widget_form_behaviour_close_on_submit'])) ? $cf7tel_options['customize_form']['chat_widget_form_behaviour_close_on_submit'] : $defaults['customize_form']['chat_widget_form_behaviour_close_on_submit'];

// Display Greetings Popup
$display_greeting_popup = (isset($cf7tel_options['greetings']['display_greeting_popup'])) ? $cf7tel_options['greetings']['display_greeting_popup'] : $defaults['greetings']['display_greeting_popup'];
$choose_greetings_template = (isset($cf7tel_options['greetings']['choose_greetings_template'])) ? $cf7tel_options['greetings']['choose_greetings_template'] : $defaults['greetings']['choose_greetings_template'];
$simple_greetings_template_type = (isset($cf7tel_options['greetings']['choose_simple_greetings_template_type'])) ? $cf7tel_options['greetings']['choose_simple_greetings_template_type'] : $defaults['greetings']['choose_simple_greetings_template_type'];
$wave_greetings_template_type = (isset($cf7tel_options['greetings']['choose_wave_greetings_template_type'])) ? $cf7tel_options['greetings']['choose_wave_greetings_template_type'] : $defaults['greetings']['choose_wave_greetings_template_type'];

// Simple Greetings
$simple_greetings_heading = (isset($cf7tel_options['greetings']['simple_greetings_heading'])) ? $cf7tel_options['greetings']['simple_greetings_heading'] : $defaults['greetings']['simple_greetings_heading'];
$simple_greetings_message = (isset($cf7tel_options['greetings']['simple_greetings_message'])) ? $cf7tel_options['greetings']['simple_greetings_message'] : $defaults['greetings']['simple_greetings_message'];

// Wave Greetings
$wave_greetings_show_main_content = (isset($cf7tel_options['greetings']['wave_greetings_show_main_content'])) ? $cf7tel_options['greetings']['wave_greetings_show_main_content'] : $defaults['greetings']['wave_greetings_show_main_content'];
$wave_greetings_custom_icon = (isset($cf7tel_options['greetings']['wave_greetings_style_1_custom_icon'])) ? $cf7tel_options['greetings']['wave_greetings_style_1_custom_icon'] : "";
$wave_greetings_style_1_icon_position = (isset($cf7tel_options['greetings']['wave_greetings_style_1_icon_position'])) ? $cf7tel_options['greetings']['wave_greetings_style_1_icon_position'] : $defaults['greetings']['wave_greetings_style_1_icon_position'];

$wave_greetings_style_1_greeting_heading = (isset($cf7tel_options['greetings']['wave_greetings_style_1_greeting_heading'])) ? $cf7tel_options['greetings']['wave_greetings_style_1_greeting_heading'] : $defaults['greetings']['wave_greetings_style_1_greeting_heading'];
$wave_greetings_style_1_message = (isset($cf7tel_options['greetings']['wave_greetings_style_1_message'])) ? $cf7tel_options['greetings']['wave_greetings_style_1_message'] : $defaults['greetings']['wave_greetings_style_1_message'];

$wave_greetings_style_1_show_greeting_cta = (isset($cf7tel_options['greetings']['wave_greetings_style_1_show_greeting_cta'])) ? $cf7tel_options['greetings']['wave_greetings_style_1_show_greeting_cta'] : $defaults['greetings']['wave_greetings_style_1_show_greeting_cta'];
$wave_greetings_style_1_greeting_cta_text = (isset($cf7tel_options['greetings']['wave_greetings_style_1_greeting_cta_text'])) ? $cf7tel_options['greetings']['wave_greetings_style_1_greeting_cta_text'] : $defaults['greetings']['wave_greetings_style_1_greeting_cta_text'];
$wave_greetings_style_1_cta_icon = (isset($cf7tel_options['greetings']['wave_greetings_style_1_cta_icon'])) ? $cf7tel_options['greetings']['wave_greetings_style_1_cta_icon'] : "";

$greeting_behavior_on_click_action = (isset($cf7tel_options['greetings']['greeting_behavior_on_click_action'])) ? $cf7tel_options['greetings']['greeting_behavior_on_click_action'] : $defaults['greetings']['greeting_behavior_on_click_action'];

// Triggers & Targeting
$triggers_activate_cf7_form_chat_widget = (isset($cf7tel_options['triggers-targeting']['triggers_activate_cf7_form_chat_widget'])) ? $cf7tel_options['triggers-targeting']['triggers_activate_cf7_form_chat_widget'] : $defaults['triggers-targeting']['triggers_activate_cf7_form_chat_widget'];
$triggers_time_delay = (isset($cf7tel_options['triggers-targeting']['triggers_time_delay'])) ? $cf7tel_options['triggers-targeting']['triggers_time_delay'] : $defaults['triggers-targeting']['triggers_time_delay'];
$triggers_show_form_after_second = (isset($cf7tel_options['triggers-targeting']['triggers_show_form_after_second'])) ? $cf7tel_options['triggers-targeting']['triggers_show_form_after_second'] : $defaults['triggers-targeting']['triggers_show_form_after_second'];

$targeting_exclude_pages = (isset($cf7tel_options['triggers-targeting']['targeting_exclude_pages'])) ? $cf7tel_options['triggers-targeting']['targeting_exclude_pages'] : $defaults['triggers-targeting']['targeting_exclude_pages'];
$targeting_exclude_all_except_switch = (isset($cf7tel_options['triggers-targeting']['targeting_exclude_all_except_switch'])) ? $cf7tel_options['triggers-targeting']['targeting_exclude_all_except_switch'] : $defaults['triggers-targeting']['targeting_exclude_all_except_switch'];
$targeting_exclude_all_except_pages = (isset($cf7tel_options['triggers-targeting']['targeting_exclude_all_except_pages'])) ? $cf7tel_options['triggers-targeting']['targeting_exclude_all_except_pages'] : $defaults['triggers-targeting']['targeting_exclude_all_except_pages'];

$default_form_disaply = ($form_open_by_default == 'on') ? 'flex' : 'none';
$default_greetings_disaply = ($form_open_by_default == 'on') ? 'none' : 'flex';
?>
<div class="cf7tel-chat-widgets" <?php if(isset($triggers_time_delay) && $triggers_time_delay == "on" && !empty($triggers_show_form_after_second)) { ?>style="display: none;"<?php } ?>>
    <div class="cf7tel-chat-widget cf7tel-chat-widget-begin cf7tel-chat-widget-<?php esc_attr_e($chat_widget_icon_position); ?>" style="display: <?php esc_attr_e($default_form_disaply); ?>;">
        <div class="cf7tel-chat-widget-form">

            <div class="cf7tel-chat-widget-form-title">
                <span class="cf7tel-chat-widget-form-title-text"><?php esc_html_e($chat_widget_form_title); ?></span>
                <div class="cf7tel-chat-widget-close-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                            <path fill="currentColor" d="M12.707 15.707a1 1 0 0 1-1.414 0L5.636 10.05A1 1 0 1 1 7.05 8.636l4.95 4.95l4.95-4.95a1 1 0 0 1 1.414 1.414z" />
                        </g>
                    </svg>
                </div>
            </div>
            <div class="cf7tel-chat-widget-form-body">
                <?php
                if (isset($chat_widget_header_text) && !empty($chat_widget_header_text)) { ?>
                    <div class="cf7tel-chat-widget-header-text">
                        <?php esc_html_e($chat_widget_header_text); ?>
                    </div>
                <?php
                } ?>
                <?php
                if (isset($chat_widget_contact_form_7) && !empty($chat_widget_contact_form_7)) {
                    echo do_shortcode('[contact-form-7 id="' . $chat_widget_contact_form_7 . '" title="Contact form 1"]');
                } else {
                    echo sprintf('<p>Please select Contact Form 7 in the <a href="%s">settings</a>.</p>', admin_url('admin.php?page=connect-cf7tel'));
                } ?>
                <?php
                if (isset($chat_widget_footer_text) && !empty($chat_widget_footer_text)) { ?>
                    <div class="cf7tel-chat-widget-footer-text">
                        <?php esc_html_e($chat_widget_footer_text); ?>
                    </div>
                <?php
                } ?>
            </div>
        </div>

        <div class="cf7tel-chat-widget-handle-btn">
            <?php
            if (isset($chat_widget_cta_switch) && $chat_widget_cta_switch == 'on') { ?>
                <div class="cf7tel-chat-widget-handle-btn-text"><?php esc_html_e($chat_widget_cta_text); ?></div>
            <?php
            } ?>
            <div class="cf7tel-chat-widget-handle-btn-icon">
                <?php
                $telegram_icon_url = CF7TEL_PLUGIN_URL . '/admin/assets/images/telegram.svg';
                ?>
                <img src="<?php echo esc_url($telegram_icon_url); ?>" alt="telegram" width="1em" height="1em">

            </div>
        </div>
    </div>

    <div class="cf7tel-chat-widget cf7tel-chat-widget-end cf7tel-chat-widget-<?php esc_attr_e($chat_widget_icon_position); ?>">
        <?php
        if (isset($display_greeting_popup) && $display_greeting_popup == "on") { ?>
            <div class="cf7tel-chat-widget-greetings">
                <?php
                if (isset($choose_greetings_template) && $choose_greetings_template == "simple") { ?>
                    <div class="cf7tel-chat-widget-greeting-box cf7tel-chat-widget-sub-greetings cf7tel-chat-widget-greetings-simple" style="display: <?php esc_attr_e($default_greetings_disaply); ?>;">
                        <div class="cf7tel-chat-widget-greetings-close-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29l-4.3 4.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l4.29-4.3l4.29 4.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42Z" />
                            </svg>
                        </div>
                        <div class="cf7tel-chat-widget-greetings-simple-title">
                            <?php echo wp_kses($simple_greetings_heading, array('img' => array('title' => array(), 'src'    => array(), 'alt'    => array()))); ?>
                        </div>
                        <?php
                        if (isset($simple_greetings_message) && !empty($simple_greetings_message)) { ?>
                            <div class="cf7tel-chat-widget-greetings-simple-text"><?php esc_html_e($simple_greetings_message); ?></div>
                        <?php
                        } ?>
                    </div>
                <?php
                } ?>

                <?php
                if ($choose_greetings_template == "wave" && $wave_greetings_template_type == "choose_wave_greetings_template_type_style_1") {
                    $wave_order = $heading_order = $message_order = $cta_order = "";
                    if($wave_greetings_style_1_icon_position == 'after_heading') {
                        $wave_order = 'order-2';
                        $heading_order = 'order-1';
                        $message_order = 'order-3';
                        $cta_order = 'order-4';
                    }

                    if($wave_greetings_style_1_icon_position == 'after_message') {
                        $wave_order = 'order-3';
                        $heading_order = 'order-1';
                        $message_order = 'order-2';
                        $cta_order = 'order-4';
                    } ?>
                    <div class="cf7tel-chat-widget-greeting-box cf7tel-chat-widget-sub-greetings cf7tel-chat-widget-greetings-wave" style="display: <?php esc_attr_e($default_greetings_disaply); ?>;">
                        <div class="cf7tel-chat-widget-greetings-close-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29l-4.3 4.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l4.29-4.3l4.29 4.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42Z" />
                            </svg>
                        </div>
                        <?php
                        if (isset($wave_greetings_show_main_content) && $wave_greetings_show_main_content == "on") { ?>
                            <div class="cf7tel-chat-widget-greetings-wave-1-icon <?php esc_attr_e($wave_order); ?>">
                                <?php $wave_icon_url = CF7TEL_PLUGIN_URL . '/admin/assets/images/wave.svg'; ?>
                                <img src="<?php echo esc_url($wave_icon_url); ?>" alt="wave" width="80px" height="80px">
                            </div>
                        <?php
                        } ?>
                        <div class="cf7tel-chat-widget-greetings-wave-title <?php esc_attr_e($heading_order); ?>">
                            <?php esc_html_e($wave_greetings_style_1_greeting_heading); ?>
                        </div>
                        <div class="cf7tel-chat-widget-greetings-wave-text <?php esc_attr_e($message_order); ?>"><?php echo esc_textarea($wave_greetings_style_1_message); ?></div>
                        <?php
                        if(isset($wave_greetings_style_1_show_greeting_cta) && $wave_greetings_style_1_show_greeting_cta == "on") {
                            ?>
                            <div class="cf7tel-chat-widget-greetings-wave-cta <?php esc_attr_e($cta_order); ?>">
                                <span class="cf7tel-chat-widget-greetings-wave-cta-icon">
                                    <?php $greetings_cta_icon_url = CF7TEL_PLUGIN_URL . '/admin/assets/images/greeting-cta-chat-icon.svg'; ?>
                                    <img src="<?php echo esc_url($greetings_cta_icon_url); ?>" alt="greeting-cta-chat-icon" width="1em" height="1em">
                                </span>
                                <span class="cf7tel-chat-widget-greetings-wave-cta-text"><?php esc_html_e($wave_greetings_style_1_greeting_cta_text); ?></span>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                <?php
                } ?>
            </div>
        <?php
        } ?>

        <div class="cf7tel-chat-widget-handle-btn">
            <?php
            if (isset($chat_widget_cta_switch) && $chat_widget_cta_switch == 'on') { ?>
                <div class="cf7tel-chat-widget-handle-btn-text"><?php esc_html_e($chat_widget_cta_text); ?></div>
            <?php
            } ?>
            <div class="cf7tel-chat-widget-handle-btn-icon">
                <?php $telegram_icon_url = CF7TEL_PLUGIN_URL . '/admin/assets/images/telegram.svg'; ?>
                <img src="<?php echo esc_url($telegram_icon_url); ?>" alt="telegram" width="1em" height="1em">
            </div>
        </div>
    </div>
</div>