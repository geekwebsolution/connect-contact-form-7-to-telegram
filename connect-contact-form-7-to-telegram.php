<?php
/*
Plugin Name: Connect Contact Form 7 to Telegram
Description: Send a message directly to your WhatsApp account through Contact Form 7 forms.
Author: Geek Code Lab
Version: 1.0.0
Author URI: https://geekcodelab.com/
Text Domain : connect-contact-form-7-to-telegram
*/

if (!defined('ABSPATH')) exit;

define('CF7TEL_PLUGIN_VERSION', '1.0.0');
define('CF7TEL_TEXT_DOMAIN', 'connect-contact-form-7-to-telegram');

if (!defined('CF7TEL_PLUGIN_DIR_PATH'))
	define('CF7TEL_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));

if (!defined('CF7TEL_PLUGIN_URL'))
	define('CF7TEL_PLUGIN_URL', plugins_url() . '/' . basename(dirname(__FILE__)));

/**
 * Admin notice when Contact form 7 is not active
 */
add_action( 'admin_init', 'cf7tel_plugin_load' );
function cf7tel_plugin_load(){
	if ( ! ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) ) {
		add_action( 'admin_notices', 'cf7tel_install_contact_form_7_admin_notice' );
		deactivate_plugins("connect-contact-form-7-to-telegrams/connect-contact-form-7-to-telegrams.php");
		return;
	}
}

function cf7tel_install_contact_form_7_admin_notice() { ?>
	<div class="error">
		<p>
			<?php
			echo esc_html__( sprintf( '%s is enabled but not effective. It requires Contact Form 7 in order to work.', 'Connect Contact Form 7 to Telegram' ), CF7TEL_TEXT_DOMAIN );
			?>
		</p>
	</div>
	<?php
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_connect-contact-form-7-to-telegram/connect-contact-form-7-to-telegram.php", 'cf7tel_add_plugin_settings_link');
function cf7tel_add_plugin_settings_link($links)
{
	if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
		$support_link = '<a href="https://geekcodelab.com/contact/" target="_blank" >' . __('Support', CF7TEL_TEXT_DOMAIN) . '</a>';
		array_unshift($links, $support_link);

		$setting_link = '<a href="' . admin_url('admin.php?page=cf7tel_telegram') . '">' . __('Settings', CF7TEL_TEXT_DOMAIN) . '</a>';
		array_unshift($links, $setting_link);
	}
	return $links;
}


/** Telegram send message files */
require_once(CF7TEL_PLUGIN_DIR_PATH . '/includes/class-tel-functions.php');
require_once(CF7TEL_PLUGIN_DIR_PATH . '/admin/class-tel-admin.php');