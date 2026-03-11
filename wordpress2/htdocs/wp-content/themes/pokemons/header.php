<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo("name"); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= get_stylesheet_uri(); ?>">
    <script src="<?= get_stylesheet_directory_uri(); ?>/main.js" defer></script>
</head>
<body <?php body_class(); ?>>
    
<?php wp_body_open(); ?>

<header>
    
</header>