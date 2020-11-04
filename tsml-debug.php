<?php
/*
Plugin Name: TSML Debug
Plugin URI: https://wordpress.org/plugins/tsml-debug
Description: Provide debug/support services for the 12 Step Meeting List Plugin
Version: 0.0.0
Author: Code4Recovery
Author URI: https://github.com/code4recovery/tsml-debug
Text Domain: tsml-debug
 */

 /* Ensure 12 Step Meeting List Plugin is enabled */
 if (defined('TSML_VERSION')) {
     /* Add Admin Menu item */
     if (is_admin()) {
        add_action('admin_menu', 'tsml_debug_admin_menu');

        function tsml_debug_admin_menu() {
            add_submenu_page('edit.php?post_type=tsml_meeting', __('TSML Debug', 'tsml-debug'), __('TSML Debug', 'tsml-debug'), 'manage_options', 'tsml_debug', 'tsml_debug_page');
        }
     }

 }
