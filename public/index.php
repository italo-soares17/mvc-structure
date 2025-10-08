<?php
require 'C:\xampp\htdocs\php\MVC\app\core\Router.php';

$url = $_GET['url'] ?? '';

$router = new Router;
$router->dispatch($url);