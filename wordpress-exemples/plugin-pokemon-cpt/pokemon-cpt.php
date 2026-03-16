<?php
/**
 * Plugin Name: Gestion Pokémon
 */

// On enregistre le type de contenu "Pokémon"
add_action( 'init', 'enregistrer_pokemon_cpt' );

function enregistrer_pokemon_cpt() {
    register_post_type( 'pokemon', array(
        'labels'      => array( 'name' => 'Pokémon', 'singular_name' => 'Pokémon' ),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'   => 'dashicons-pets', // Icône sympa dans le menu
    ));
}
