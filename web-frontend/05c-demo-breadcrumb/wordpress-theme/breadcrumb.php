<?php 

function get_custom_breadcrumbs() {
    if (is_front_page()) return;

    echo '<nav aria-label="Fil d\'Ariane" class="breadcrumb-container">';
    echo '<ol class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">';

    // Accueil
    echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="' . home_url() . '"><span itemprop="name">Accueil</span></a>
            <meta itemprop="position" content="1" />
          </li>';

    if (is_category() || is_single()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        the_category(' ');
        echo '<meta itemprop="position" content="2" /></li>';
        
        if (is_single()) {
            echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name" class="breadcrumb_last" aria-current="page">' . get_the_title() . '</span>
                    <meta itemprop="position" content="3" />
                  </li>';
        }
    } elseif (is_page()) {
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span itemprop="name" class="breadcrumb_last" aria-current="page">' . get_the_title() . '</span>
                <meta itemprop="position" content="2" />
              </li>';
    }

    echo '</ol></nav>';
}
