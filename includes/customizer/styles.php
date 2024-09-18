<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Customizer Library WooCommerce Designer
 */
if ( !function_exists( 'connect_cf7_to_telegram_style_build' ) && class_exists( 'connect_cf7_to_telegram_library_Styles' ) ) {
    /**
     * Process user options to generate CSS needed to implement the choices.
     *
     * @since  1.0.0.
     *
     * @return void
     */
    function connect_cf7_to_telegram_style_build()
    {
        $cf7tel_defaults = cf7tel_defaults();
        $cf7tel_options  = get_option('cf7tel_options');

        $chat_widget_status  = isset($cf7tel_options['triggers-targeting']['triggers_activate_cf7_form_chat_widget']) ? $cf7tel_options['triggers-targeting']['triggers_activate_cf7_form_chat_widget'] : "";

        if(isset($chat_widget_status) && $chat_widget_status == "on") {

            /** Customize Icon CSS */

            $customize_form_key = "customize_form";
            $greetings_key = "greetings";

            // Icon Size
            $cwis_key = "chat_widget_icon_size";

            if(isset($cf7tel_options[$customize_form_key][$cwis_key])) {
                $cwisc_key = "chat_widget_icon_size_custom";
                
                $icon_size = array( 
                    "small" => 46, 
                    "medium" => 56, 
                    "large" => 66, 
                    "custom" => (isset($cf7tel_options[$customize_form_key][$cwisc_key]) && !empty($cf7tel_options[$customize_form_key][$cwisc_key])) ? $cf7tel_options[$customize_form_key][$cwisc_key] : $cf7tel_defaults[$customize_form_key][$cwisc_key] 
                );
                $chat_widget_icon_size = $cf7tel_options[$customize_form_key][$cwis_key];

                if(isset($icon_size[$chat_widget_icon_size])) {
                    connect_cf7_to_telegram_library_Styles()->add( array(
                        'selectors'    => array( '.cf7tel-chat-widget-handle-btn-icon' ),
                        'declarations' => array( 'font-size' => intval($icon_size[$chat_widget_icon_size]) . 'px' ),
                    ) );
                }
            }

            /** Call to action CSS */
            $chat_widget_cta_switch = (isset($cf7tel_options['customize_form']['chat_widget_cta_switch'])) ? $cf7tel_options['customize_form']['chat_widget_cta_switch'] : "";
            if (isset($chat_widget_cta_switch) && $chat_widget_cta_switch == 'on') {
                // Call to action style

                // Text Size
                $cwcts_key = "chat_widget_cta_text_size";

                if(isset($cf7tel_options[$customize_form_key][$cwcts_key])) {
                    $cwctsc_key = "chat_widget_cta_text_size_custom";
                    
                    $text_size = array( 
                        "small" => 14, 
                        "medium" => 18, 
                        "large" => 20, 
                        "custom" => (isset($cf7tel_options[$customize_form_key][$cwctsc_key]) && !empty($cf7tel_options[$customize_form_key][$cwctsc_key])) ? $cf7tel_options[$customize_form_key][$cwctsc_key] : $cf7tel_defaults[$customize_form_key][$cwctsc_key] 
                    );
                    $chat_widget_cta_text_size = $cf7tel_options[$customize_form_key][$cwcts_key];

                    if(isset($text_size[$chat_widget_cta_text_size])) {
                        connect_cf7_to_telegram_library_Styles()->add( array(
                            'selectors'    => array( '.cf7tel-chat-widget-handle-btn-text' ),
                            'declarations' => array( 'font-size' => intval($text_size[$chat_widget_cta_text_size]) . 'px' ),
                        ) );
                    }
                }
            }            

            // Customize Form
            $chat_widget_contact_form_7 = (isset($cf7tel_options['customize_form']['chat_widget_contact_form_7'])) ? $cf7tel_options['customize_form']['chat_widget_contact_form_7'] : "";
            
            if (isset($chat_widget_contact_form_7) && !empty($chat_widget_contact_form_7)) {

                // Form Style Font Family
                $cwfff_key = "chat_widget_form_font_family";

                if(isset($cf7tel_options[$customize_form_key][$cwfff_key])) {
                    connect_cf7_to_telegram_library_Styles()->add( array(
                        'selectors'    => array( '.cf7tel-chat-widget-form' ),
                        'declarations' => array( '--cf7tel-primary-font' => $cf7tel_options[$customize_form_key][$cwfff_key] ),
                    ) );
                }
            }

            /** Greetings CSS */

            // Display Greetings Popup
            $display_greeting_popup = (isset($cf7tel_options['greetings']['display_greeting_popup'])) ? $cf7tel_options['greetings']['display_greeting_popup'] : "";
            $choose_greetings_template = (isset($cf7tel_options['greetings']['choose_greetings_template'])) ? $cf7tel_options['greetings']['choose_greetings_template'] : "";
            $simple_greetings_template_type = (isset($cf7tel_options['greetings']['choose_simple_greetings_template_type'])) ? $cf7tel_options['greetings']['choose_simple_greetings_template_type'] : "";
            $wave_greetings_template_type = (isset($cf7tel_options['greetings']['choose_wave_greetings_template_type'])) ? $cf7tel_options['greetings']['choose_wave_greetings_template_type'] : "";

            if (isset($display_greeting_popup) && $display_greeting_popup == "on") {

                if(isset($choose_greetings_template) && $choose_greetings_template == "simple") {
                    // Simple Customize Greetings Heading Text Size
                    $sghs_key = "simple_greetings_heading_size";

                    if(isset($cf7tel_options[$greetings_key][$sghs_key])) {
                        $sghcs_key = "simple_greetings_heading_custom_size";
                        
                        $text_size = array( 
                            "small" => 12, 
                            "medium" => 14,
                            "large" => 16, 
                            "custom" => (isset($cf7tel_options[$greetings_key][$sghcs_key]) && !empty($cf7tel_options[$greetings_key][$sghcs_key])) ? $cf7tel_options[$greetings_key][$sghcs_key] : $cf7tel_defaults[$greetings_key][$sghcs_key] 
                        );
                        $chat_widget_cta_text_size = $cf7tel_options[$greetings_key][$sghs_key];

                        if(isset($text_size[$chat_widget_cta_text_size])) {
                            connect_cf7_to_telegram_library_Styles()->add( array(
                                'selectors'    => array( '.cf7tel-chat-widget-greetings-simple-title' ),
                                'declarations' => array( 'font-size' => intval($text_size[$chat_widget_cta_text_size]) . 'px' ),
                            ) );
                        }
                    }

                    // Simple Customize Greetings Message Text Size
                    $sgms_key = "simple_greetings_message_size";

                    if(isset($cf7tel_options[$greetings_key][$sgms_key])) {
                        $sgmcs_key = "simple_greetings_message_custom_size";
                        
                        $text_size = array( 
                            "small" => 12, 
                            "medium" => 14, 
                            "large" => 16, 
                            "custom" => (isset($cf7tel_options[$greetings_key][$sgmcs_key]) && !empty($cf7tel_options[$greetings_key][$sgmcs_key])) ? $cf7tel_options[$greetings_key][$sgmcs_key] : $cf7tel_defaults[$greetings_key][$sgmcs_key] 
                        );
                        $chat_widget_cta_text_size = $cf7tel_options[$greetings_key][$sgms_key];

                        if(isset($text_size[$chat_widget_cta_text_size])) {
                            connect_cf7_to_telegram_library_Styles()->add( array(
                                'selectors'    => array( '.cf7tel-chat-widget-greetings-simple-text' ),
                                'declarations' => array( 'font-size' => intval($text_size[$chat_widget_cta_text_size]) . 'px' ),
                            ) );
                        }
                    }

                    /** Simple Greeting Template Colors */

                    // Font Family
                    $sgs1ff_key = "simple_greetings_style_1_font_family";

                    if(isset($cf7tel_options[$greetings_key][$sgs1ff_key])) {
                        connect_cf7_to_telegram_library_Styles()->add( array(
                            'selectors'    => array( '.cf7tel-chat-widget-greetings' ),
                            'declarations' => array( '--cf7tel-primary-font' => $cf7tel_options[$greetings_key][$sgs1ff_key] ),
                        ) );
                    }
                }

                if(isset($choose_greetings_template) && $choose_greetings_template == "wave" && $wave_greetings_template_type == "choose_wave_greetings_template_type_style_1") {

                    // Wave Style 1 Greetings Heading Text Size
                    $wgs1hsl_key = "wave_greetings_style_1_heading_size_large";

                    if(isset($cf7tel_options[$greetings_key][$wgs1hsl_key])) {
                        $wgs1hcs_key = "wave_greetings_style_1_heading_custom_size";
                        
                        $text_size = array( 
                            "small" => 12, 
                            "medium" => 14, 
                            "large" => 16, 
                            "custom" => (isset($cf7tel_options[$greetings_key][$wgs1hcs_key]) && !empty($cf7tel_options[$greetings_key][$wgs1hcs_key])) ? $cf7tel_options[$greetings_key][$wgs1hcs_key] : $cf7tel_defaults[$greetings_key][$wgs1hcs_key] 
                        );
                        $chat_widget_cta_text_size = $cf7tel_options[$greetings_key][$wgs1hsl_key];

                        if(isset($text_size[$chat_widget_cta_text_size])) {
                            connect_cf7_to_telegram_library_Styles()->add( array(
                                'selectors'    => array( '.cf7tel-chat-widget-greetings-wave .cf7tel-chat-widget-greetings-wave-title' ),
                                'declarations' => array( 'font-size' => intval($text_size[$chat_widget_cta_text_size]) . 'px' ),
                            ) );
                        }
                    }

                    // Wave Style 1 Greetings Message Text Size
                    $wgs1msl_key = "wave_greetings_style_1_message_size";

                    if(isset($cf7tel_options[$greetings_key][$wgs1msl_key])) {
                        $wgs1mcs_key = "wave_greetings_style_1_message_custom_size";
                        
                        $text_size = array( 
                            "small" => 12, 
                            "medium" => 14, 
                            "large" => 16, 
                            "custom" => (isset($cf7tel_options[$greetings_key][$wgs1mcs_key]) && !empty($cf7tel_options[$greetings_key][$wgs1mcs_key])) ? $cf7tel_options[$greetings_key][$wgs1mcs_key] : $cf7tel_defaults[$greetings_key][$wgs1mcs_key] 
                        );
                        $chat_widget_cta_text_size = $cf7tel_options[$greetings_key][$wgs1msl_key];

                        if(isset($text_size[$chat_widget_cta_text_size])) {
                            connect_cf7_to_telegram_library_Styles()->add( array(
                                'selectors'    => array( '.cf7tel-chat-widget-greetings-wave .cf7tel-chat-widget-greetings-wave-text' ),
                                'declarations' => array( 'font-size' => intval($text_size[$chat_widget_cta_text_size]) . 'px' ),
                            ) );
                        }
                    }

                    // Wave Style 1 Greetings CTA Style
                    /** Simple Greeting Template Colors */

                    // Font Family
                    $wgs1ff_key = "wave_greetings_style_1_font_family";

                    if(isset($cf7tel_options[$greetings_key][$wgs1ff_key])) {
                        connect_cf7_to_telegram_library_Styles()->add( array(
                            'selectors'    => array( '.cf7tel-chat-widget-greetings' ),
                            'declarations' => array( '--cf7tel-primary-font' => $cf7tel_options[$greetings_key][$wgs1ff_key] ),
                        ) );
                    }
                }
            }
        }
    }

}
add_action( 'customizer_library_styles', 'connect_cf7_to_telegram_style_build' );
if ( !function_exists( 'woocustomizer_customizer_library_styles' ) ) {
    /**
     * Generates the style tag and CSS needed for the theme options.
     *
     * By using the "connect_cf7_to_telegram_library_Styles" filter, different components can print CSS in the header.
     * It is organized this way to ensure there is only one "style" tag.
     *
     * @since  1.0.0.
     *
     * @return void
     */
    function woocustomizer_customizer_library_styles()
    {
        $cf7tel_options  = get_option('cf7tel_options');
        $chat_widget_status  = isset($cf7tel_options['triggers-targeting']['triggers_activate_cf7_form_chat_widget']) ? $cf7tel_options['triggers-targeting']['triggers_activate_cf7_form_chat_widget'] : "";

        if(isset($chat_widget_status) && $chat_widget_status == "on") {
            do_action( 'customizer_library_styles' );
            // Echo the rules
            $css = connect_cf7_to_telegram_library_Styles()->build();
            
            if ( !empty($css) ) {
                wp_register_style( 'cf7tel-customizer-custom-css', false, array('cf7tel_style') );
                wp_enqueue_style( 'cf7tel-customizer-custom-css' );
                wp_add_inline_style( 'cf7tel-customizer-custom-css', $css );
            }
        }
    
    }

}
add_action( 'wp_enqueue_scripts', 'woocustomizer_customizer_library_styles', 11 );

function cf7tel_getContrastColor( $hexColor )
{
    // hexColor RGB
    $R1 = hexdec( substr( $hexColor, 1, 2 ) );
    $G1 = hexdec( substr( $hexColor, 3, 2 ) );
    $B1 = hexdec( substr( $hexColor, 5, 2 ) );
    // Black RGB
    $blackColor = "#000000";
    $R2BlackColor = hexdec( substr( $blackColor, 1, 2 ) );
    $G2BlackColor = hexdec( substr( $blackColor, 3, 2 ) );
    $B2BlackColor = hexdec( substr( $blackColor, 5, 2 ) );
    // Calc contrast ratio
    $L1 = 0.2126 * pow( $R1 / 255, 2.2 ) + 0.7151999999999999 * pow( $G1 / 255, 2.2 ) + 0.0722 * pow( $B1 / 255, 2.2 );
    $L2 = 0.2126 * pow( $R2BlackColor / 255, 2.2 ) + 0.7151999999999999 * pow( $G2BlackColor / 255, 2.2 ) + 0.0722 * pow( $B2BlackColor / 255, 2.2 );
    $contrastRatio = 0;
    
    if ( $L1 > $L2 ) {
        $contrastRatio = (int) (($L1 + 0.05) / ($L2 + 0.05));
    } else {
        $contrastRatio = (int) (($L2 + 0.05) / ($L1 + 0.05));
    }
    
    // If contrast is more than 5, return black color
    
    if ( $contrastRatio > 5 ) {
        return '#000000';
    } else {
        // if not, return white color.
        return '#FFFFFF';
    }

}

function cf7tel_sanitize_hex_color( $color ) {
	if ( '' === $color ) {
		return '';
	}

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return null;
}