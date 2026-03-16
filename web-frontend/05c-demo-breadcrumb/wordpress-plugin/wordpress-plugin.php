<?php

/**
 * Plugin Name: Mon Fil d'Ariane
 * Description: Ajoute un fil d'Ariane responsive avec microdonnées Schema.org via le shortcode [mon_breadcrumb].
 * Version: 1.0
 * Author: Prénom NOM
 */

if (! defined('ABSPATH')) exit;

// Chargement du CSS
function mfa_enqueue_styles()
{
    // Charge le fichier style.css situé dans le dossier de l'extension
    wp_enqueue_style(
        'mfa-style',
        plugins_url('style.css', __FILE__)
    );
}
add_action('wp_enqueue_scripts', 'mfa_enqueue_styles');

/function mfa_generate_breadcrumbs() {
    if ( is_front_page() ) return '';

    $output = '<nav aria-label="Fil d\'Ariane" class="breadcrumb-container">';
    $output .= '<ol class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">';

    // 1. Accueil
    $output .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="' . esc_url(home_url()) . '"><span itemprop="name">Accueil</span></a>
                    <meta itemprop="position" content="1" />
                </li>';

    $position = 2;

    // 2. Hiérarchie Pages
    if ( is_page() ) {
        $post = get_post();
        if ( $post->post_parent ) {
            $breadcrumbs = array();
            $parent_id = $post->post_parent;
            while ( $parent_id ) {
                $page = get_post( $parent_id );
                if ( $page ) {
                    $breadcrumbs[] = '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                        <a itemprop="item" href="' . esc_url(get_permalink( $page->ID )) . '">
                                            <span itemprop="name">' . esc_html(get_the_title( $page->ID )) . '</span>
                                        </a>
                                        <meta itemprop="position" content="' . $position . '" />
                                      </li>';
                    $parent_id = $page->post_parent;
                    $position++;
                } else { break; }
            }
            $output .= implode( '', array_reverse( $breadcrumbs ) );
        }
    } 
    // 2. Hiérarchie Articles (Catégories)
    elseif ( is_single() ) {
        $categories = get_the_category();
        if ( $categories && !is_wp_error( $categories ) ) {
            $output .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a itemprop="item" href="' . esc_url(get_category_link( $categories[0]->term_id )) . '">
                                <span itemprop="name">' . esc_html($categories[0]->name) . '</span>
                            </a>
                            <meta itemprop="position" content="' . $position . '" />
                        </li>';
            $position++;
        }
    }

    // 3. Page actuelle
    $output .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name" class="breadcrumb_last" aria-current="page">' . esc_html(get_the_title()) . '</span>
                    <meta itemprop="position" content="' . $position . '" />
                </li>';

    $output .= '</ol></nav>';
    return $output;
}

// Création du shortcode [mon_breadcrumb]
add_shortcode('mon_breadcrumb', 'mfa_generate_breadcrumbs');




// Ajout dans l'admin de wordpress
