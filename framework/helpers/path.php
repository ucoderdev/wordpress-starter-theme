<?php
// Get theme admin path
function admin_path($folder = null)
{
    $path = str_replace('/', DS, ADMIN_PATH);
    $output = $path;

    if ($folder) {
        $folder = str_replace('/', DS, $folder);
        return $output . $folder;
    }

    return $output;
}

// Get app path
function app_path($folder = null)
{
    $path = str_replace('/', DS, APP_PATH);
    $output = $path;

    if ($folder) {
        $folder = str_replace('/', DS, $folder);
        return $output . $folder;
    }

    return $output;
}

// Get assets path
function assets_path($folder = null)
{
    $path = str_replace('/', DS, ASSETS_PATH);
    $output = $path;

    if ($folder) {
        $folder = str_replace('/', DS, $folder);
        return $output . $folder;
    }

    return $output;
}

// Get framework path
function framework_path($folder = null)
{
    $path = str_replace('/', DS, FRAMEWORK_PATH);
    $output = $path;

    if ($folder) {
        $folder = str_replace('/', DS, $folder);
        return $output . $folder;
    }

    return $output;
}

// Get inc path
function inc_path($folder = null)
{
    $path = str_replace('/', DS, INC_PATH);
    $output = $path;

    if ($folder) {
        $folder = str_replace('/', DS, $folder);
        return $output . $folder;
    }

    return $output;
}

// Get templates path
function templates_path($folder = null)
{
    $path = str_replace('/', DS, TEMPLATES_PATH);
    $output = $path;

    if ($folder) {
        $folder = str_replace('/', DS, $folder);
        return $output . $folder;
    }

    return $output;
}

// Get base path
function theme_path($folder = null)
{
    $path = str_replace('/', DS, THEME_PATH);
    $output = $path;

    if ($folder) {
        $folder = str_replace('/', DS, $folder);
        return $output . $folder;
    }

    return $output;
}