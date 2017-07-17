<?php

/* Plugin Name: APPOCALYPSIS Popups and Widgets
 * Plugin URI: http://appocalypsis.com/
 * Description: Over 70+ Widget Templates to Choose from! We provide the Tools to Communicate your Marketing Messages in an Efficient way. Create, manage & monitor website widgets in 5minutes POPUPS, OPT-INS, COUNTDOWNS, FORMS, INLINE ELEMENTS
 * Version: 1.0.9
 * Author: APPOCALYPSIS 
 * Author URI: https://appocalypsis.com/
 * License: GPLv2 or later
 * 
 * APPOCALYPSIS Popups and Widgets is free software: 
 * you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * APPOCALYPSIS Popups and Widgets is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
define('APCL_PLUGIN_NAME', 'APPOCALYPSIS Popups and Widgets');
define('APCL_VERSION', '1.0.9');
define('APCL_PLUGIN_URI', '' . plugin_dir_path(__FILE__) . '');
define('APCL_PLUGIN_URL', '' . plugin_dir_url(__FILE__) . '');
define('APCL_SETTING_KEY', 'prj_description');
add_action('admin_menu', 'appocalypsis_create_admin');

function appocalypsis_create_admin() {
    add_menu_page('APPOCALYPSIS Popups and Widgets', 'Appocalypsis', 'manage_options', 'appocalypsis', 'appocalypsis_create_admin_content', APCL_PLUGIN_URL . 'assets/appoicon.ico', 6);
    add_action( 'admin_init', 'register_appocalypsis_settings' );
}

function register_appocalypsis_settings() {
    register_setting( 'appocalypsis-settings-group', APCL_SETTING_KEY );
}

function appocalypsis_html_admin_css() {
    wp_register_style('admin_css', APCL_PLUGIN_URL . 'assets/css/style.css');
    wp_enqueue_style('admin_css');
    wp_enqueue_script('admin_script', APCL_PLUGIN_URL . 'assets/js/script-admin.js');
}

add_action('admin_footer', 'appocalypsis_html_admin_css');

function appocalypsis_create_admin_content() {
    global $wpdb;
    include 'templates/template.php';
}

function appocalypsis_append_before_head_tag_cu() {
    $key = get_option(APCL_SETTING_KEY, "[SET YOUR KEY HERE]");
    $SCRIPT = "<script type='text/javascript'> var appoInit=document.createElement('script'); var appoS=document.getElementsByTagName('script')[0]; appoInit.type='text/javascript'; appoInit.src='https://www.appocalypsis.com/loader/init/" . $key . ".js'; appoInit.async=true; appoS.parentNode.insertBefore(appoInit, appoS); </script>";
    echo $SCRIPT;
}

add_action('wp_head', 'appocalypsis_append_before_head_tag_cu', 9987979999);

