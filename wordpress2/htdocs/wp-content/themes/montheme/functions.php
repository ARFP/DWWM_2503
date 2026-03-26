<?php 

function md_add_thumbnails() {
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'md_add_thumbnails');



function md_theme_menu_sidebar() {
    register_nav_menus([
        'main' => 'Menu Principal',
        'foot' => 'Menu Bas de page'
    ]);

    register_sidebar([
        'id' => 'main-sidebar',
        'name' => 'Sidebar Accueil',
        'before_widget' => '<div class="montheme-widget">',
        'after_widget' => '</div>',
    ]);
}

add_action('init', 'md_theme_menu_sidebar');
