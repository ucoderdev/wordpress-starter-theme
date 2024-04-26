<?php
/**
 * Register menu locations
 * https://developer.wordpress.org/reference/functions/register_nav_menus/
 *
 * @author      Ulugbek Nuriddinov <hello@ucoder.dev>
 * @link        https://github.com/ucoderdev/wordpress-starter-theme
 * @since       1.0.0
 */

// Register menus
register_nav_menus(
    array(
        'header-menu' => __('Header Menu Top', 'wp'),
        'footer-menu' => __('Footer Menu', 'wp'),
    )
);
