<?php 

function afficher_page(string $page): void {

    $page = mb_convert_case($page, MB_CASE_LOWER); // minuscules

    switch($page) {
    case 'home':
        require '../src/views/home.php';
        break;
    case 'profil':
        require '../src/views/profil.php';
        break;
    default: 
        echo 'Page non trouvée !';
    }
}
