<?php

/**
 * Cache
 *
 * @author      Ulugbek Nuriddinov <hello@ucoder.dev>
 * @link        https://github.com/ucoderdev/wordpress-starter-theme
 * @since       1.0.0
 */
class Cache
{
    /**
     * Cache dir
     *
     * @var string
     */
    public static $dir = 'wp-content/cache/local/';

    /**
     * Delete cache by key
     *
     * @return void
     */
    public static function delete(string $key)
    {
        $cache_dir = ABSPATH . self::$dir . $key;

        if (is_dir($cache_dir)) {
            rm_dir($cache_dir);
        }
    }

    /**
     * Delete all cache
     *
     * @return void
     */
    public static function delete_all()
    {
        $cache_dir = ABSPATH . self::$dir;

        if (is_dir($cache_dir)) {
            rm_dir($cache_dir);
        }
    }

    /**
     * ACF: get_field()
     * https://www.advancedcustomfields.com/resources/get_field/
     *
     * @param string  $selector     The field name or key.
     * @param mixed   $post_id      The post_id of which the value is saved against.
     * @return mixed
     */
    public static function get_field(string $selector, $post_id = null)
    {
        if (!is_null($post_id) && !empty($post_id)) {
            $id = $post_id;
        } else {
            $id = acf_get_valid_post_id($post_id);
        }

        // Cache
        $hash_str = $selector . '-id:' . $id;
        $cache_dir = ABSPATH . self::$dir . 'acf/';
        $cache_file = $cache_dir . md5($hash_str) . '.json';

        if (is_file($cache_file)) {
            $json = file_get_contents($cache_file);
            $data = json_decode($json, true);

            return $data;
        }

        // Write data
        $data = get_field($selector, $id);

        if (!is_dir($cache_dir)) {
            mkdir($cache_dir, 0755, true);
        }

        file_put_contents($cache_file, json_encode($data));

        return $data;
    }

    /**
     * WP: get_posts()
     * https://developer.wordpress.org/reference/functions/get_posts/
     *
     * @param array $args
     * @return mixed
     */
    public static function get_posts(array $args)
    {
        $hash_str = json_encode($args);
        $cache_dir = ABSPATH . self::$dir . 'posts/';
        $cache_file = $cache_dir . md5($hash_str) . '.json';

        if (is_file($cache_file)) {
            $json = file_get_contents($cache_file);
            $data = json_decode($json);

            return $data;
        }

        // Write data
        $data = get_posts($args);

        if (!is_dir($cache_dir)) {
            mkdir($cache_dir, 0755, true);
        }

        file_put_contents($cache_file, json_encode($data));

        return $data;
    }
}
