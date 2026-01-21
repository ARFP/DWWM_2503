<?php 
// Simple API

header('ContentType: application/json; charset=utf-8');

require('Users.php');

$users = new Users;

$json = file_get_contents('users.json');
$data = json_decode($json, true);

$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];
$id = basename($url);
$id = intval($id);


switch($method) {
    case 'GET':
        http_response_code(501);
        exit(json_encode(['error' => 'Not Implemented']));
    break;
    case 'POST':
    case 'PUT':
    break;
    case 'DELETE':
    break;
    default: 
        http_response_code(405);
        exit(json_encode(['error' => 'Method Not Allowed']));
}