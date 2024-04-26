<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

    <script>
        var site_url = "<?= home_url(); ?>";
        var assets_url = "<?= assets_url(); ?>";
        var error_message = "<?= __('An error occurred while processing your request. Please try again.', 'wp'); ?>";
    </script>
</head>

<body <?php body_class(); ?>>