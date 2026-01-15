<?php 

/**
 * Affichage des dossiers présents dans le répertoire courant
 */
foreach(glob(__DIR__.'/*', GLOB_ONLYDIR) as $f) {
    $n = basename($f);
    echo '<a href="'.$n.'/">'.$n.'</a><br>';
}
