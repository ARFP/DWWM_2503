<?php 

/**
 * Plugin Name: Signature Automatique
 */

// On demande à WordPress : "Quand tu affiches le contenu, exécute ma fonction"
add_filter( 'the_content', 'ajouter_signature' );

function ajouter_signature( $content ) {
    // Si on est sur un article seul, on ajoute la signature
    if ( is_single() ) {
        $signature = '<p style="color: grey; border-top: 1px solid #ccc;">
                      © 2026 - Tous droits réservés.</p>';
        return $content . $signature;
    }
    
    // Sinon, on renvoie le contenu tel quel
    return $content;
}