<?php

require_once 'C:\xampp\htdocs\php\MVC\app\core\Controller.php';
require_once 'C:\xampp\htdocs\php\MVC\app\models\Usuario.php';
class HomeController extends Controller{
    public function index(){
        $usuario = new Usuario();
        $data = $usuario->getUserData();
        $this->view('home/index', $data);
    }
    public function contact(){
        $this->View('home/contact');
    }
}