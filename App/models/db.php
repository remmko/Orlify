<?php

namespace App\models;

class db {

    public $sql;

    public function __construct($user, $pass, $db, $host){

        $dsn = "mysql:dbname={$db};host={$host}";
        try {
            $this->sql = new \PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
            die('Connection error: ' . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->sql;
    }
}