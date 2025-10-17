<?php

require_once "C:/xampp/htdocs/php/MVC/vendor/autoload.php";

use App\Core\Router;

$url = $_GET['url'] ?? '';

$router = new Router;
$router->dispatch($url);