<?php 

if(str_ends_with($_SERVER['REQUEST_URI'], 'fn.php')) {
    header('location: ../');
}


function globDir($dir, $title = 'Voir aussi : ') {
    echo "<h2>$title</h2>";
    echo '<ul><li><a href="../">...</a></li>';
    foreach(glob($dir.'/*') as $f) {
        $n = basename($f);
        echo '<li><a href="'.$n.'">'.$n.'</a></li>';
    }
    echo '</ul><hr>';
}

function hl($file) {
    $file = highlight_file($file ,true);
    echo '<pre>'.$file.'</pre>';
}
