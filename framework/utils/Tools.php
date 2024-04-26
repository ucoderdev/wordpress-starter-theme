<?php

namespace Utils;

/**
 * Tools
 *
 * @author      Ulugbek Nuriddinov <hello@ucoder.dev>
 * @link        https://github.com/ucoderdev/wordpress-starter-theme
 * @since       1.0.0
 */
class Tools
{
    // Remove file ext from name
    public static function file_ext_from_name($str = false)
    {
        $array = array('.jpg', '.jpeg', '.png', '.gif');

        if ($str) {
            $output = str_replace($array, '', mb_strtolower($str));
            return $output;
        }

        return false;
    }

    // Number format
    public static function numformat($number = false, $default = null)
    {
        if (is_numeric($number) && $number > 0) {
            return number_format($number, 0, '', '.');
        } elseif (is_numeric($default)) {
            return $default;
        }
    }

    // Format website
    public static function format_website($string = false, $type = 'name')
    {
        $site_name = str_replace('http://', '', $string);
        $site_name = str_replace('https://', '', $site_name);

        if ($type == 'name') {
            return rtrim($site_name, '/');
        } else {
            $protocol = 'http://';

            if (stripos($string, 'https://') !== false) {
                $protocol = 'https://';
            }

            return $protocol . $site_name;
        }
    }

    // Log
    public static function log($message, $file)
    {
        $log = $message . PHP_EOL;
        $log .= "-------------------------------------------------" . PHP_EOL;

        file_put_contents($file, $log, FILE_APPEND);
    }
}
