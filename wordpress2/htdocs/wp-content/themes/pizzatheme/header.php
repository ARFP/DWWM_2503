<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <nav>
        <?php wp_nav_menu(['theme_location' => 'menuPrincipal']); ?> 
    </nav>
    <main>
        <!-- FIN HEADER -->