<?php
// Clean array
function clean_array($array = array())
{
    $output = array();

    if ($array) {
        foreach ($array as $key => $value) {
            $clear_key = esc_html(esc_attr($key));

            if (is_array($value) && $value) {
                $clear_value = clean_array($value);
            } else {
                $clear_value = esc_html(esc_attr($value));
            }

            $output[$clear_key] = $clear_value;
        }
    }

    return $output;
};

// Clear string from tags and chars
function clean_str($data)
{
    $datas = trim($data);
    $datas = strip_tags($datas);

    return esc_html(esc_attr($datas));
}
