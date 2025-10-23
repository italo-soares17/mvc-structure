<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Core\Database;
use App\Models\Usuario;



class HomeController extends Controller{
    public function index(){
        $usuario = new Usuario();
        $data = $usuario->getUserData();

        echo 'usuario com id 1: ' . $usuario->getUserById(1)['name'] . '<br>';
        echo 'Total de usuarios: ' . $usuario->getUsersCount() . '<br>';
        $this->view('home/index', $data);
    }
    public function contact(){
        $this->View('home/contact');
    }
}