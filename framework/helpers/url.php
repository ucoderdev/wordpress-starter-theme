<?php
// Get assets folder url
function admin_folder_url($file = '')
{
    return ADMIN_PATH_URL . trim($file);
}

// Get assets folder url
function assets_url($file = '')
{
    return ASSETS_PATH_URL . trim($file);
}

// Get theme folder url
function theme_url($file = '')
{
    return THEME_PATH_URL . trim($file);
}

// Uploads URL
function uploads_url($file = '')
{
    $upload_dir = wp_upload_dir();
    return $upload_dir['baseurl'] . ltrim($file, '/');
}
