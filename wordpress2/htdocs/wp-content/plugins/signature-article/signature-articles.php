<?php 
/**
 * Plugin Name: Plugin Signature
 * Description: Ajoute une signature sous les articles 
 * Author: Mickaël DEVOLDERE 
 */

function md_signature($content) {
    
    $signature = '<p style="color: darkblue;">Copyright '. get_bloginfo('name') .' 2026. Tous droits réservés.</p>';

    if(is_single()) {
       return $content . $signature;
    }
    else if (is_page()) {
        return $signature. $content;
    }

    return $content;
}

add_filter('the_content', 'md_signature');
