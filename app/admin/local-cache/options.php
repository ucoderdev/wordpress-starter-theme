<?php

/**
 * Fires immediately before an option value is updated.
 * See: https://developer.wordpress.org/reference/hooks/update_option/
 */
add_action('update_option', function ($option_name, $old_value, $value) {
    Cache::delete('acf');
}, 10, 3);
