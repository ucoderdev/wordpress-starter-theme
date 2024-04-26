<?php
// Functions
require __DIR__ . '/functions.php';

// Include is admin
if (is_admin()) {
    require __DIR__ . '/filters.php';

    // Include local cache
    autoload_files(__DIR__ . '/local-cache');

    // Include pages
    autoload_files(__DIR__ . '/pages');
}
