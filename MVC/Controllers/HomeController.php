<?php 

class HomeController
{
    /**
     * GET /
     * GET /home
     * GET /home/index
     */
    public function index()
    {
        // Appel de la vue HTML
        require '../Views/home.index.php';
    }

    /**
     * GET /home/about
     */
    public function about()
    {
        // Appel de la vue HTML
        require '../Views/home.about.php';
    }
}
