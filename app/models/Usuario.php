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
    public function createUser($name){
        $sql = 'INSERT INTO users (name) VALUES (:name)';
        $params = ['name' => $name];
        return $this->db->execute($sql, $params);
    }
    public function getAllUsers(){
        $users = $this->db->fetchAll('SELECT * FROM users');
        return $users;
    }
    public function getUserById($id){
        return $this->db->fetch('SELECT * FROM users WHERE id = :id', ['id' => $id]);
    }
    public function getUsersCount(){
        $result = $this->db->fetch('SELECT COUNT(*) as count FROM users');
        return $result['count'];
    }
}