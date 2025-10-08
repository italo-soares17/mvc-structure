<?php

class HttpErrorController extends Controller{
    public function NotFound(){
        http_response_code(404);
        $this->View('errors/404');
    }
    public function InternalServerError(){
        http_response_code(500);
        $this->View('errors/500');
    }
    public function Unauthorized(){
        http_response_code(403);
        $this->View('errors/403');
    }
}