<?php 

function mde_theme_setup() {
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'mde_theme_setup');

function mde_sidebar_setup() {
    register_sidebar([
        'id' => 'principal',
        'name' => 'Sidebar Principale'
    ]);
}

add_action('widgets_init', 'mde_sidebar_setup');

function mde_menu_setup() {
    register_nav_menus([
        'menuPrincipal' => 'Mon menu'
    ]);
}

add_action('init', 'mde_menu_setup');