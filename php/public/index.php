<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $a = 'Toto';

        echo 'Hello World $a ' . $a . '<br>';

        echo "Hello World $a <br>";

        if(true) {

        } elseif (false) {

        } else {

        }

        switch($a) {
            case 1:
                break;
            case 2:
                break;
        }

        while(true) {

        }

        do {

        } while(true);

        for($i=0; $i < 10; $i++) {

        }

        $b = [0 => 'a', 'b', 'c'];
       // $c = array('a', 'b', 'c');
       $d = [
        'toto' => 2
       ];

        foreach($b as $key => $item) {
            
        }

        
        echo '<hr>';
        
        /**
         * Affichage des dossiers présents dans le répertoire courant
         */
        foreach(glob(__DIR__.'/*') as $f) {
            $n = basename($f);
            echo '<a href="'.$n.'">'.$n.'</a><br>';
        }


    ?>
</body>
</html>