<?php 
/* index.php : Point d'entrée de l'application */


/**
 * @var string $url récupération du paramètres 'url' depuis la barre d'adresse (GET)
 * http://localhost/?url=controleur/action/id
 */
$url = $_GET['url'] ?? '';

/** @var array $parts Sépare le chemin en plusieurs parties
 * On obtient un tableau 
 * Par exemple pour l'url http://localhost/?url=controleur/action/id
 * [0 => 'controller', 1 => 'action', 2 => 'id']
 * Par exemple pour l'url http://localhost/?url=flower/afficher/2
 * [0 => 'flower', 1 => 'afficher', 2 => '2']
 */
$parts = explode('/', $url);

// Récupère la 1ere entrée du tableau qui corrrespond au nom du contrôleur à invoquer
$controller = $parts[0] ?? 'home';

// récupère la 2ème partie qui correspond à la méthode (fonction) à invoquer dans le contrôleur
$action = $parts[1] ?? 'index';

// Récupère la 3ème partie qui correspond à la valeur transmises à la méthode invoquée dans le contrôleur
$id = $parts[2] ?? null;



/**
 * ROUTAGE 
 * On évalue la 1ère partie du chemin correspondant au nom du contrôleur
 * Si on  trouve une correspondance, on instancie le contrôleur 
 * Si pas de correspondance, on instancien le contrôleur par défaut
 */
switch($controller) 
{
    case 'home':
       require_once '../Controllers/HomeController.php';
       $controller = new HomeController();
    break;
    case 'flower':
       require_once '../Controllers/FlowerController.php';
       $controller = new FlowerController();
    break;
    default:
       exit('Erreur 404 : contrôleur introuvable');
    break;
    
}

// On execute l'action dans le contrôleur
// voir dans le fichier correspondant
$controller->execute($action, $id);

// si le contrôleur n'a rien fait, erreur 404
echo 'Erreur 404 : Action dans le contrôleur introuvable'; 
