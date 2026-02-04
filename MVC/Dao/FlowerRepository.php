<?php 

require_once '../Models/Flower.php';

class FlowerRepository 
{

    private array $data;

    public function __construct() {
        $this->data = [];
        $rawData = require '../Models/flowers.data.php';

        foreach($rawData as $flower) {
            $f = new Flower();
            $f->id = $flower['id'];
            $f->name = $flower['name'];
            $f->color = $flower['color'];
            $this->data[] = $f;
        }
    }

    public function findAll() : array {
        return $this->data;
    }

    public function findOne(int $id) : ?Flower {
        return null;
    }


    public function delete(int $id) : bool {
        return true;
    }

    public function insert(Flower $flower): ?Flower {
        return null;
    }

    public function update(Flower $flower) : bool {
        return true;
    }
}