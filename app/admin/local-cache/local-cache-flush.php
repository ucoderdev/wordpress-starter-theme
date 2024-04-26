<?php 
// Create page
add_action('admin_menu', function () {
    add_submenu_page('tools.php', 'Local Cache Flush', 'Local Cache Flush', 'manage_options', 'locale-cache-flush-all', 'local_cache_flush_all_page');
});

// Admin page
function local_cache_flush_all_page() {
    Cache::delete_all();

    // Show page
    echo '<div class="wrap">';
        echo '<h2>Local cache</h2>';
        echo '<p>Local cache: Remove all files</p>';
        echo '<p>Done!</p>';
    echo '</div>';
}