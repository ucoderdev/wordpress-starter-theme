<?php
// Load boot file
require_once __DIR__ . '/framework/init.php';

// After setup theme
add_action('after_setup_theme', function () {
    load_theme_textdomain(THEME_NAME, INC_PATH . '/languages');
    load_child_theme_textdomain('wp', INC_PATH . '/languages');
});

// Hide admin bar
add_filter('show_admin_bar', '__return_false');

// Enqueue scripts
add_action('wp_enqueue_scripts', function () {
    $version = '1.0.0';
    $is_development_mode = false;

    if ($is_development_mode) {
        $version = strtotime('now');
    }

    $dist_uri = assets_url('dist');
    $libs_uri = assets_url('libs');

    wp_enqueue_style('css-vendors', $dist_uri . '/vendors.css', array(), $version, 'all');
    wp_enqueue_style('css-theme', $dist_uri . '/theme.css', array(), $version, 'all');

    wp_enqueue_script('js-vendors', $dist_uri . '/vendors.js', array('jquery'), $version);
    wp_enqueue_script('js-theme', $dist_uri . '/theme.js', array('jquery'), $version);
});
