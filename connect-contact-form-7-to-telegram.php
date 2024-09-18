<?php
/*
Plugin Name: Connect Contact Form 7 to Telegram
Description: Send a message directly to your telegram account through Contact Form 7 forms.
Author: Geek Code Lab
Version: 1.0.4
Author URI: https://geekcodelab.com/
Text Domain : connect-contact-form-7-to-telegram
Requires Plugins: contact-form-7
License: GPLv2 or later
*/

if (!defined('ABSPATH')) exit;

define('CF7TEL_PLUGIN_VERSION', '1.0.4');

if (!defined('CF7TEL_PLUGIN_DIR_PATH'))
	define('CF7TEL_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));

if (!defined('CF7TEL_PLUGIN_URL'))
	define('CF7TEL_PLUGIN_URL', plugins_url() . '/' . basename(dirname(__FILE__)));

register_activation_hook(__FILE__, 'cf7tel_plugin_active_notice');
function cf7tel_plugin_active_notice()
{
    if (is_plugin_active('connect-contact-form-7-to-telegram-pro/connect-contact-form-7-to-telegram-pro.php')) {
        deactivate_plugins('connect-contact-form-7-to-telegram-pro/connect-contact-form-7-to-telegram-pro.php');
    }
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_connect-contact-form-7-to-telegram/connect-contact-form-7-to-telegram.php", 'cf7tel_add_plugin_settings_link');
function cf7tel_add_plugin_settings_link($links)
{
	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
		$support_link = '<a href="https://geekcodelab.com/contact/" target="_blank" >' . __('Support', 'connect-contact-form-7-to-telegram') . '</a>';
		array_unshift($links, $support_link);

		$setting_link = '<a href="' . admin_url('admin.php?page=cf7tel_telegram') . '">' . __('Settings', 'connect-contact-form-7-to-telegram') . '</a>';
		array_unshift($links, $setting_link);
	}
	return $links;
}


/** Telegram send message files */
require_once(CF7TEL_PLUGIN_DIR_PATH . 'includes/functions.php');
require_once(CF7TEL_PLUGIN_DIR_PATH . '/includes/class-tel-functions.php');
require_once(CF7TEL_PLUGIN_DIR_PATH . 'public/class-public.php');
require_once(CF7TEL_PLUGIN_DIR_PATH . '/admin/class-tel-admin.php');
require_once(CF7TEL_PLUGIN_DIR_PATH . 'includes/customizer/customizer-library/customizer-library.php');
require_once(CF7TEL_PLUGIN_DIR_PATH . 'includes/customizer/styles.php');