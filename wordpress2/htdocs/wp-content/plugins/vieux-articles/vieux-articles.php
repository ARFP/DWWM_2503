<?php 
/**
 * Plugin Name: Les vieux Articles
 * Description: Message d'avertissement sur les vieux articles
 * Author : Mickaël DEVOLDERE
 */

function md_old_content($content) {

    $delai = 7 * 24 * 3600; // 7 jours

    if(!is_single()) {
        return $content;
    }

    $date = get_the_date('U');

    $dateAuj = date('U');

    $dateEcart = ($dateAuj - $date);

    if($dateEcart > $delai) {
        $avertissement = '<div style="border: 2px solid red; color: red; background: #CC000022; margin:1rem; padding: 1rem;">Attention, cet article date un peu. Son contenu est peut-être obsolète !</div>';
        return $avertissement . $content;
    }

    return $content;
}

add_filter('the_content', 'md_old_content');