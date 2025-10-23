<?php

namespace App\Core;

use Exception;
use PDO;
use PDOException;

class Database{
    private $connection = null;
    private static $instance = null;

    private function __construct()
    {
        $this->connect();
    }
    public function fetch($sql, $params = []): array {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }
    public function fetchAll($sql, $params = []): array {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }
    
    public function execute($sql, $params = []): int {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }
    public function lastInsertId(): int {
        return $this->connection->lastInsertId();
    }
    public function rowCount(): int {
        return $this->connection->rowCount();
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect(){
        $dataBaseConfig = config('database');

        $dsn = "mysql:host={$dataBaseConfig['host']};dbname={$dataBaseConfig['dbname']};charset={$dataBaseConfig['charset']}";

        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        try{
            $this->connection = new \PDO($dsn, $dataBaseConfig['user'], $dataBaseConfig['password'], $options);
            return;
        } catch (PDOException $e){
            throw new \Exception('erro de conexao: ' . $e->getMessage());
        }
        

    }
    public function query($sql, $params = []){
        try{
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (\PDOException $e){
            throw new Exception('erro de consulta ao BD: ' . $e->getMessage());
        }
    }
}