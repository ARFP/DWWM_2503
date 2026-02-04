<?php 

require_once '../Models/Flower.php';
require '../Dao/FlowerRepository.php';
require '../AbstractController.php';

/**
 * 
 */
class FlowerController extends AbstractController
{
    /**
     * GET : /flower
     * GET /flower/index
     */
    public function index()
    {
        // Le repository contient les requêtes pour lire la base de données
        $repo = new FlowerRepository();

        // Récupération de toutes les fleurs.
        $flowers = $repo->findAll();

        // Affichage de la vue correspondante, la variable $flowers est disponible dans la vue
        require '../Views/flower.index.php';
    }

    /**
     * /flower/afficher/{id}
     */
    public function afficher(int $id) 
    {
        // Le repository contient les requêtes pour lire la base de données
        $repo = new FlowerRepository();

        // Récupération d'une fleur
        $flower = $repo->findOne($id);

        // Affichage de la vue correspondante, la variable $flower est disponible dans la vue
        require '../Views/flower.afficher.php';
    }
}
