<?php
// Load boostrap file
require_once __DIR__  . '/bootstrap.php';

// Global vars
$current_user = array();
$is_logged_in = is_user_logged_in();
$current_lang = get_locale();

// Create container
$container = new Container;
$container::$current_lang = $current_lang;

if ($is_logged_in) {
    $current_user = wp_get_current_user();

    $container::$is_logged_in = true;
    $container::$current_user = $current_user;
    $container::$current_user_id = $current_user->ID;
}

// ACF check
if (!function_exists('get_fields') && !is_admin()) {
    echo 'Plugin "Advanced Custom Fields" required! Please install to use the theme!';
    die();
}

// Disable wp-json
add_filter('rest_authentication_errors', function ($result) {
    // If a previous authentication check was applied,
    // pass that result along without modification.
    if (true === $result || is_wp_error($result)) {
        return $result;
    }

    // No authentication has been performed yet.
    // Return an error if user is not logged in.
    if (!is_user_logged_in()) {
        return new WP_Error(
            'rest_not_logged_in',
            __('You are not currently logged in.', 'wp'),
            array('status' => 401)
        );
    }

    // Our custom authentication check should have no effect
    // on logged-in requests
    return $result;
});

// ACF save JSON to path
add_filter('acf/settings/save_json', function ($path) {
    return INC_PATH . 'acf';
});

// ACF load JSON from path
add_filter('acf/settings/load_json', function ($paths) {
    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = INC_PATH . 'acf';

    // return
    return $paths;
});
