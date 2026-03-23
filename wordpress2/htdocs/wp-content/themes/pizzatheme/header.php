<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <script defer>
       /* setInterval(() => {
            const colors = ['blue', 'red', 'yellow', 'chartreuse', 'orange'];
            let idx = Math.random(0,colors.length);
            idx = Math.floor(idx * colors.length);
            document.body.style.backgroundColor = colors[idx];
        }, 10000);*/
    </script>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header">
        <a href="/">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/pikatchu.jpg" alt="Logo de Toto">
        </a>
        <div class="site-navigation">
            <p class="site-title"><?php bloginfo('name'); ?></p>
            <nav>
                <?php wp_nav_menu(['theme_location' => 'menuPrincipal']); ?> 
            </nav>
        </div>
    </header>
    <div class="wrapper">
    <main class="site-main">
        <!-- FIN HEADER -->