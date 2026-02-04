<?php 

class HomeController
{
    public function index()
    {
        require '../Views/home.index.php';
    }

    public function about()
    {
        require '../Views/home.about.php';
    }
}
