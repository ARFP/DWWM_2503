<?php 

require_once '../Models/Flower.php';
require '../Dao/FlowerRepository.php';
require '../AbstractController.php';

class FlowerController extends AbstractController
{
    public function index()
    {
        $repo = new FlowerRepository();

        $flowers = $repo->findAll();

        require '../Views/flower.index.php';
    }
}
