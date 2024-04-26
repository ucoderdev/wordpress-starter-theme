<?php
define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', dirname(__DIR__) . DS);

define('THEME_NAME', basename(dirname(__DIR__)));
define('THEME_PATH', dirname(__DIR__) . DS);
define('THEME_PATH_URL', get_theme_root_uri() . '/' . THEME_NAME . '/');

define('APP_PATH', THEME_PATH . 'app' . DS);
define('APP_PATH_URL', THEME_PATH_URL . 'app' . '/');

define('ADMIN_PATH', APP_PATH . 'admin' . DS);
define('ADMIN_PATH_URL', THEME_PATH_URL . 'admin' . '/');

define('ASSETS_PATH', THEME_PATH . 'assets' . DS);
define('ASSETS_PATH_URL', THEME_PATH_URL . 'assets' . '/');

define('FRAMEWORK_PATH', THEME_PATH . 'framework' . DS);
define('INC_PATH', THEME_PATH . 'inc' . DS);
define('TEMPLATES_PATH', THEME_PATH . 'templates' . DS);

// Load vendor
require_once 'vendor/autoload.php';

// Autoload namespaces
spl_autoload_register(function ($class_name) {
    if (substr($class_name, 0, 3) == 'App') {
        $str = '';
        $array = explode('\\', $class_name);

        foreach ($array as $i => $string) {
            if ($i < 2) {
                $str .= '/' . strtolower($string);
            } else {
                $str .= '/' . $string;
            }
        }

        $filename = str_replace('/app/', '', $str) . '.php';

        require APP_PATH . $filename;
    }
});

// Load helpers
foreach (glob(__DIR__ . '/helpers/*.php') as $filename) {
    require $filename;
}

// Load system classes
foreach (glob(__DIR__ . '/core/*.php') as $filename) {
    require $filename;
}

// Load theme setup
foreach (glob(APP_PATH . 'setup/*.php') as $filename) {
    require $filename;
}

// Include admin actions
require ADMIN_PATH . 'init.php';
