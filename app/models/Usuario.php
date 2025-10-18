<?php

namespace App\Models;
use App\Core\Model;

class Usuario extends Model{
    public function getUserData(){
        return[
            'nome' => 'Italo Soares Leite',
            'idade' => '16',
            'Email' => 'Italo@gmail.com'
        ];
    }
        public function testDb(){
        $sql = 'SELECT 1+3 AS test';
        $result = $this->db->query($sql);
        return $result->fetch();
    }
}