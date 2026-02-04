<?php 

$url = $_GET['url'] ?? '';

$parts = explode('/', $url);

$controller = $parts[0] ?? 'home';
$action = $parts[1] ?? 'index';
$id = $parts[2] ?? null;

//var_export($action);

$controller = $controller.'Controller.php';

switch($controller) 
{
    case 'flower':
       require_once '../Controllers/FlowerController.php';
       $controller = new FlowerController();
    break;
    default:
       require_once '../Controllers/HomeController.php';
       $controller = new HomeController();
    break;
    
}

$controller->execute($action, $id);


echo 'erreur404'; 
