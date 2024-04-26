<?php
// Add assets files
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_media();
    wp_enqueue_script('admin-scripts', admin_folder_url('assets/admin-scripts.js'), [], '1.0.0');
});

// Init
add_action('init', function () {
    wp_enqueue_style('admin-styles', admin_folder_url('assets/admin-style.css'), [], '1.0.0');
});

// Remove the content editor from all pages
add_action('admin_head', function () {
    remove_post_type_support('page', 'editor');
});
