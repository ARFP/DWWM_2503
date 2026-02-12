<?php 

// Le polymorphisme 

interface Humain 
{
    public function danser(): void;
}

interface Alien 
{
    public function visiter(): void;
}


class Personne implements Humain
{
    private string $nom;

    public function __construct(string $_nom) {
        $this->nom = $_nom;
    }

    public function getNom(): string {
        return $this->nom . "\n";
    }

   public function danser(): void {
        echo $this->nom . " danse !";
    }
}


class Adulte extends Personne
{
    private int $age;

    public function __construct(string $_nom, int $_age)
    {
        parent::__construct($_nom);
        $this->age = $_age;
    }

    public function getNom(): string {
        return 'Adulte: ' . parent::getNom() . "\n";
    }

    public function getAge() {
        return 'Age: ' . $this->age . "\n";
    }
}

class Roger extends Personne implements Alien, Humain
{

    public function __construct(string $_nom)
    {
        return parent::__construct($_nom);
    }

    public function visiter(): void {
        echo "Je visite ta ville ! HAHAHA !";
    }
}