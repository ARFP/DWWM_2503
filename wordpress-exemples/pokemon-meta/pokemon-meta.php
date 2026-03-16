<?php
/**
 * Plugin Name: Gestion Pokémon (Meta)
 */

// 1. Ajouter le formulaire dans l'admin
add_action( 'add_meta_boxes', 'ajouter_meta_box_pokemon' );
function ajouter_meta_box_pokemon() {
    add_meta_box( 'pokemon_type', 'Type du Pokémon', 'afficher_formulaire_type', 'pokemon', 'side' );
}

function afficher_formulaire_type( $post ) {
    $val = get_post_meta( $post->ID, '_pokemon_type', true );
    echo '<input type="text" name="pokemon_type" value="' . esc_attr($val) . '" placeholder="Ex: Feu">';
}

// 2. Sauvegarder la donnée
add_action( 'save_post', 'sauvegarder_type_pokemon' );
function sauvegarder_type_pokemon( $post_id ) {
    if ( isset( $_POST['pokemon_type'] ) ) {
        update_post_meta( $post_id, '_pokemon_type', sanitize_text_field( $_POST['pokemon_type'] ) );
    }
}



add_filter( 'the_content', 'afficher_type_dans_contenu' );
function afficher_type_dans_contenu( $content ) {
    if ( is_singular( 'pokemon' ) ) {
        $type = get_post_meta( get_the_ID(), '_pokemon_type', true );
        $info = '<p><strong>Type : </strong>' . esc_html($type) . '</p>';
        return $info . $content;
    }
    return $content;
}