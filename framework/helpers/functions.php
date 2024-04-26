<?php

/**
 * Search for a post with a particular template.
 *
 * @param string $template  Template filename.
 * @param string $post_type Post type.
 * @param array  $args      (Optional) See also get_posts() for example parameter usage.
 * @param bool   $single    (Optional) Whether to return a single value.
 *
 * @return Will be an array of WP_Post if $single is false. Will be a WP_Post object if the post is find, FALSE otherwise
 */
if (!function_exists('get_post_by_template')) {
    function get_post_by_template($template, $post_type = 'page', $single = true)
    {
        $posts_by_template = wp_cache_get('posts_by_template', 'cyrale');

        if (empty($posts_by_template) || !is_array($posts_by_template)) {
            $posts_by_template = array();
        }

        if (!isset($posts_by_template[$template])) {
            $args = array(
                'posts_per_page' => -1,
                'post_type'      => $post_type,
                'suppress_filters'  => 0,
                'meta_query'     => array(
                    array(
                        'key'   => '_wp_page_template',
                        'value' => $template,
                    ),
                ),
            );

            $posts = get_posts($args);
            $posts_by_template[$template] = array(
                'single' => !empty($posts) && is_array($posts) ? reset($posts) : false,
                'posts'  => $posts,
            );
        }

        wp_cache_set('posts_by_template', $posts_by_template, 'cyrale');
        return $posts_by_template[$template][$single ? 'single' : 'posts'];
    }
}

/**
 * Get templates
 *
 * @param string $post_type Post type.
 *
 * @return Will be an array of templates
 */
if (!function_exists('get_templates')) {
    function get_templates($post_type)
    {
        $array = array();
        $templates = wp_get_theme()->get_post_templates();

        if ($templates) {
            foreach ($templates as $type => $items) {
                $add = false;


                if ($type == $post_type) {
                    $add = true;
                }

                if ($add && $items) {
                    foreach ($items as $key => $name) {
                        $key = str_replace('.php', '', $key);
                        $key = str_replace('templates/', '', $key);

                        $array[] = array(
                            'key' => trim($key),
                            'name' => $name
                        );
                    }
                }
            }
        }

        return $array;
    }
}
