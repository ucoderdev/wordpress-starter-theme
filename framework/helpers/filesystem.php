<?php 

// Autoload php files
function autoload_files($folder)
{
    if (is_dir($folder)) {
        foreach (glob($folder . '/*.php') as $filename) {
            include $filename;
        }
    } elseif (is_dir(theme_path($folder))) {
        foreach (glob(theme_path($folder) . '/*.php') as $filename) {
            include $filename;
        }
    }
}

// Include file
function include_file($file)
{
    $inc = $file . '.php';

    if (is_file($inc)) {
        include $inc;
    } elseif (is_file(theme_path($inc))) {
        include theme_path($inc);
    } else {
        return false;
    }
}

// Remove dirs
function rm_dir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);

        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir") {
                    rm_dir($dir . "/" . $object);
                } else {
                    unlink($dir . "/" . $object);
                }
            }
        }

        reset($objects);
        rmdir($dir);
    }
}