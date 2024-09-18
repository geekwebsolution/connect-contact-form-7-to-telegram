<?php
/**
 * Get form setting options
 */
function cf7tel_defaults() {
	$cf7tel_defaults = array(
		'telegram_info' => array(
			'cf7tel_form_chats' => array()
		),
		'customize_form' => array(
			'chat_widget_icon_size' => 'medium', 
			'chat_widget_icon_size_custom' => '80', 
			'chat_widget_icon_position' => 'right',
			'chat_widget_cta_switch' => 'on',
			'chat_widget_cta_text' => 'Contact us',
			'chat_widget_cta_text_size' => 'medium',
			'chat_widget_cta_text_size_custom' => '20',
			'chat_widget_contact_form_7' => '', 
			'chat_widget_form_title' => 'Contact via telegram',
			'chat_widget_header_text' => '',
			'chat_widget_footer_text' => '',
			'chat_widget_form_font_family' => 'Rubik',
			'chat_widget_form_behaviour_open_by_default' => '',
			'chat_widget_form_behaviour_close_on_submit' => 'on'
		),
		'greetings' => array(
			'display_greeting_popup' => 'on',
			'choose_greetings_template' => 'simple',
			'choose_simple_greetings_template_type' => 'choose_simple_greetings_template_type_style_1',
			'choose_wave_greetings_template_type' => 'choose_wave_greetings_template_type_style_1',
			
			'simple_greetings_heading' => '👋 Hi! Have any queries?',
			'simple_greetings_heading_size' => 'medium',
			'simple_greetings_heading_custom_size' => '',
			'simple_greetings_message' => 'Feel free to ask your queries here. We are always ready to assist you anytime.',
			'simple_greetings_message_size' => 'medium',
			'simple_greetings_message_custom_size' => '',
			'simple_greetings_style_1_heading_color' => '#828282',
			'simple_greetings_style_1_message_color' => '#4F4F4F',
			'simple_greetings_style_1_background_color' => '#FFFFFF',
			'simple_greetings_style_1_font_family' => 'Rubik',

			'wave_greetings_show_main_content' => 'on',
			'wave_greetings_style_1_custom_icon' => '',
			'wave_greetings_style_1_icon_position' => 'before_heading',
			'wave_greetings_style_1_greeting_heading' => 'What are you looking for?',
			'wave_greetings_style_1_heading_size' => 'medium',
			'wave_greetings_style_1_heading_custom_size' => '16',
			'wave_greetings_style_1_message' => 'Feel free to ask your questions here. We are always ready to assist you all the time whenever you need',
			'wave_greetings_style_1_message_size' => 'medium',
			'wave_greetings_style_1_message_custom_size' => '16',
			'wave_greetings_style_1_show_greeting_cta' => 'on',
			'wave_greetings_style_1_greeting_cta_text' => 'Ask your question',
			'wave_greetings_style_1_cta_icon' => '',
			'wave_greetings_style_1_cta_text_color' => '#2F80ED',
			'wave_greetings_style_1_cta_background' => '#F5F7F8',
			'wave_greetings_style_1_font_family' => 'Rubik',
			'greeting_behavior_on_click_action' => 'load_the_selected_form'
		),
		'triggers-targeting' => array(
			'triggers_activate_cf7_form_chat_widget' => 'on',
			'triggers_time_delay' => '',
			'triggers_show_form_after_second' => '',
			'targeting_exclude_pages' => array(),
			'targeting_exclude_all_except_switch' => '',
			'targeting_exclude_all_except_pages' => array()
		)
	);

	return $cf7tel_defaults;
}

function cf7tel_options(){
	$cf7tel_defaults = cf7tel_defaults();
	$cf7tel_options = get_option('cf7tel_options', $cf7tel_defaults );
	
	return apply_filters('cf7tel_options', $cf7tel_options);
}