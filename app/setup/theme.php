<?php

/**
 * Register theme settings
 * https://developer.wordpress.org/reference/functions/add_action/
 *
 * @author      Ulugbek Nuriddinov <hello@ucoder.dev>
 * @link        https://github.com/ucoderdev/wordpress-starter-theme
 * @since       1.0.0
 */

// Theme after setup
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
});
