<?php
require_once __DIR__ .'/../vendor/autoload.php' ;

use App\core\Router;

$url = $_GET['url'] ?? '' ;

$router = new Router();
$router->dispatch($url) ;



?>