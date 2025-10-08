<?php

class Controller{
    protected function View($view, $viewData=[]){

        extract($viewData);

        $viewFile = "C:/xampp/htdocs/php/MVC/app/views/$view.php";
        if(!file_exists($viewFile)){
            throw new Exception('View File not Found: ' . $viewFile);
        }
        require_once $viewFile;

    }
}