<?php

/**
 * Post status change
 * See: https://codex.wordpress.org/Post_Status_Transitions
 */
add_action('transition_post_status',  function ($new_status, $old_status, $post) {
    Cache::delete('acf');
    Cache::delete('posts');
}, 10, 3);
