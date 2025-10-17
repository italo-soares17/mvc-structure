<?php
require 'C:\xampp\htdocs\php\MVC\app\core\Router.php';

require_once "C:/xampp/htdocs/php/MVC/vendor/autoload.php";

$url = $_GET['url'] ?? '';

$router = new Router;
$router->dispatch($url);