<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>"> <!-- attribut lang pour l'accessibilité (lecteurs d'écrans) et aussi pour le Référencement -->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- obligatoire pour le responsive -->
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <script src="<?php echo get_stylesheet_directory_uri().'/main.js'; ?>" defer></script>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="site-header">
        <div class="accessibility">
        <!-- 1 bouton pour aggrandir la taille le texte / 1 bouton pour réduire la taille du texte -->
        <button id="textUp" title="Augmenter la taille du texte">🗚</button> 
        <button id="textDown" title="Diminuer la taille du texte">🗛</button> 
        <!-- 1 bouton pour dark mode -->
        <button id="darkMode" title="Activer/Désactiver le mode sombre">🌓</button>
        <!-- 1 bouton pour la police openDys --> 
        <button id="textChange" title="Changer la police">👁</button>
        </div>
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