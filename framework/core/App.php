<?php

/**
 * App
 *
 * @author      Ulugbek Nuriddinov <hello@ucoder.dev>
 * @link        https://github.com/ucoderdev/wordpress-starter-theme
 * @since       1.0.0
 */
class App
{
    /**
     * Get config
     *
     * @param string $key
     * @param boolean $default
     * @return mixed
     */
    public static function config(string $key, $default = null)
    {
        $file = framework_path('config.php');
        include $file;

        if (isset($config[$key])) {
            return $config[$key];
        }

        return $default;
    }
}
