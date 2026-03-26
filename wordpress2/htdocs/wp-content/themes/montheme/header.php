<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/monscript.js" defer></script>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>


<header class="site-header">
    <img id="astro" src="<?php echo get_stylesheet_directory_uri(); ?>/astro.webp" alt="">
    <img id="asteroid" src="<?php echo get_stylesheet_directory_uri(); ?>/asteroid.png" alt="">
    <h1><?php bloginfo('name'); ?></h1>
    <h2><?php bloginfo('description'); ?></h2>
    <a href="#" id="menuToggle">≡</a>
</header>

<nav class="nav-menu">
<?php wp_nav_menu([
    'theme_location' => 'main'
]) ?>
</nav>

<main> 
<!-- FIN HEADER -->