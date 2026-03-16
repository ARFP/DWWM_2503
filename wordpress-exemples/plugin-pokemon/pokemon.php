<?php
/**
 * Plugin Name: Boîte Pokémon
 * Description: Ajoute une boîte d'information Pokémon via le shortcode [pokemon_info].
 * Author: Prénom NOM
 */

// On crée le shortcode [pokemon_info]
add_shortcode( 'pokemon_info', 'creer_boite_pokemon' );

function creer_boite_pokemon( $atts, $content = null ) {
    // La boîte stylisée
    $boite = '<div style="border: 2px solid #ffcb05; padding: 15px; background: #fffde7; border-radius: 8px; font-family: sans-serif;">';
    $boite .= '<strong style="color: #3b4cca;">Info Pokémon : </strong>' . esc_html($content);
    $boite .= '</div>';
    
    return $boite; // Toujours utiliser return pour les shortcodes
}
