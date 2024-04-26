<?php
// Get array value
function array_value($array, $key, $default = null, $check_value = true)
{
    if (is_array($array) && isset($array[$key])) {
        $value = $array[$key];

        if (is_numeric($value) || is_bool($value)) {
            return $value;
        }

        if ($check_value && !is_null($value) && !empty($value)) {
            return $value;
        }

        if (!$check_value) {
            return $value;
        }
    }

    return $default;
}

// Code debug
function debug($code)
{
    echo '<pre>';
    print_r($code);
    echo '</pre>';
}

// Check cli mode
function is_cli()
{
    if (php_sapi_name() == "cli") {
        return true;
    }

    return false;
}

// JSON output
function json_output($type = 'error', $array = array())
{
    $output = [
        'error' => true,
        'status' => 404,
        'data' => array(),
        'message' => __('An error occurred while processing your request. Please try again.', 'wp'),
    ];

    if ($type == 'success') {
        $output['error'] = false;
        $output['status'] = 200;
        $output['message'] = null;
    }

    if (isset($array['status'])) {
        $output['status'] = $array['status'];
    }

    if (isset($array['message'])) {
        $output['message'] = $array['message'];
    }

    if (isset($array['data'])) {
        $output['data'] = $array['data'];
    }

    return $output;
}

// Get queried object type
function queried_object_type($object)
{
    $output = '';

    if (isset($object->post_type)) {
        $output = $object->post_type;
    } elseif (isset($object->taxonomy)) {
        $output = $object->taxonomy;
    } elseif (isset($object->name)) {
        $output = 'post_type_' . $object->name;
    }

    return $output;
}

// Include view
function get_view($file, $data = array(), $view = false)
{
    $inc = $file . '.php';

    if (is_file($inc)) {
        if ($data && is_array($data)) {
            extract($data);
        }

        if ($view) {
            ob_start();
            include $inc;
            return ob_get_clean();
        } else {
            include $inc;
        }
    }
}

// Include theme partial
function get_partial($file, $data = array(), $view = false)
{
    $inc = theme_path('partials/' . $file);
    return get_view($inc, $data, $view);
}

// Include theme section
function get_section($file, $data = array(), $view = false)
{
    $inc = theme_path('sections/' . $file);
    return get_view($inc, $data, $view);
}

// Include admin view
function admin_view($file, $data = array(), $view = false)
{
    $inc = admin_path($file);
    return get_view($inc, $data, $view);
}

// Include inc view
function inc_view($file, $data = array(), $view = false)
{
    $inc = inc_path($file);
    return get_view($inc, $data, $view);
}

// Include theme layout
function template_view($file, $data = array(), $view = false)
{
    $inc = templates_path($file);
    return get_view($inc, $data, $view);
}
