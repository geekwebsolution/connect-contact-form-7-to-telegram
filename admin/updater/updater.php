<?php

if (!defined('ABSPATH')) exit;

/**
 * License manager module
 */
function cf7tel_updater_utility() {
    $prefix = 'CF7TEL_';
    $settings = [
        'prefix' => $prefix,
        'get_base' => CF7TEL_PLUGIN_BASENAME,
        'get_slug' => CF7TEL_PLUGIN_DIR,
        'get_version' => CF7TEL_PLUGIN_VERSION,
        'get_api' => 'https://download.geekcodelab.com/',
        'license_update_class' => $prefix . 'Update_Checker'
    ];

    return $settings;
}

function cf7tel_updater_activate() {

    // Refresh transients
    delete_site_transient('update_plugins');
    delete_transient('cf7tel_plugin_updates');
    delete_transient('cf7tel_plugin_auto_updates');
}

require_once(CF7TEL_PLUGIN_DIR_PATH . 'admin/updater/class-update-checker.php');