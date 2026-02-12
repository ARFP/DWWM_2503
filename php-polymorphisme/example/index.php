<?php 

require './polymorphisme.php';

$personne = new Personne('Marvin');

$adulte = new Adulte('Roger', 25);

$roger = new Roger('Marvin');



toto($personne);
toto($adulte);


function toto(Personne $p) {
    echo $p->getNom();
    //echo $p->getAge();
    echo $p::class;
    echo "\n\n";
}



function toto2(Personne $p) : Personne {
    return $p;
}

$quiSuisJe = toto2($adulte);
echo $quiSuisJe::class;
//echo $quiSuisJe->getAge();

function faireDanser(Humain $p) {
    $p->danser();
}


faireDanser($personne);
faireDanser($adulte);
faireDanser($roger);

function visiterVille(Alien $a) {
    $a->visiter();
}

visiterVille($roger);
