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
    include plugin_dir_path(__FILE__) . '/includes/tsml_debug_page.php';

    //get the tsml debug options
    $tsml_debug = get_option('tsml_debug', array());

    //this filter enables the public debug/support page
    add_filter('init', function ($template) {
        if (isset($_GET['tsml_debug_public']) && tsml_debug_ispublic()) {
            $tsml_debug_public = $_GET['tsml_debug_public'];
            include plugin_dir_path(__FILE__) . 'templates/tsml_debug_public.php';
            die;
        }
    });


    /* Add Admin Menu item */
    if (is_admin()) {
        add_action('admin_menu', 'tsml_debug_admin_menu');

        function tsml_debug_admin_menu()
        {
            add_submenu_page('edit.php?post_type=tsml_meeting', __('TSML Debug', 'tsml-debug'), __('TSML Debug', 'tsml-debug'), 'manage_options', 'tsml_debug', 'tsml_debug_page');
        }
    }

    //function: determine whether support assistant is set to public
    //used:		ajax templates/support_assistant
    function tsml_debug_ispublic()
    {
        global $tsml_debug;

        $input = empty($_POST) ? $_GET : $_POST;
        $page_key = empty($input['key']) ? '' : $input['key'];
        $now = time();

        if ('public' == $tsml_debug['status'] && $now <= $tsml_debug['expires'] && ($page_key == $tsml_debug['key'] || 'tsml_debug' == $input['page'])) {
            return true;
        }

        // See if time has expired for this session of public status
        if ('public' == $tsml_debug['status'] && $now > $tsml_debug['expires']) {
            $tsml_debug['status'] = 'admin_only';
            $tsml_debug['expires'] = $now;
            $tsml_debug['key'] = md5(uniqid($now, true));
            update_option('tsml_debug', $tsml_debug);
        }

        return false;
    }
}
