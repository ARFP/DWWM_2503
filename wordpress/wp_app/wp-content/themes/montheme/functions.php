<?php 

function md_add_thumbnails() {
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'md_add_thumbnails');
