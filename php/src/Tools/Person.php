<?php 

/**
 * Cette classe représente une personne 
 * @author Mickaël DEVOLDERE <email@example.com>
 * @version 1.2.4
 * @todo Créer un accesseur pour l'âge
 * 
 */
class Person
{

    /** @var string $lastname Patronyme de la personne */
    private string $lastname;

    /** @var int $age L'âge de la personne */
    private int $age;

    /**
     * Constructeur
     * @param string $lastname Le nom de la personne
     * @param int $age L'âge de la personne
     */
    public function __construct(string $lastname, int $age) {
        //$this->lastname = $lastname;
        $this->age = $age;
    }

    /**
     * Récupère le nom de la personne
     * @return string Le nom de la personne
     */
    public function getLastname(): string {
        return $this->lastname;
    }

}
