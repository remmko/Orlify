<?php

namespace App\models;

    class users{
        public $sql;
        
        public function __construct($sql){
            $this->sql = $sql;
        }


        public function auth($username, $password){
            
            $stm = $this->sql->prepare('select id, username, password, role from users where login =:user;');
            $stm->execute([':user'=>$username]);
            $result = $stm->fetch(\PDO::FETCH_ASSOC);
      

            if(is_array($result) && $result["password"] == hash("sha256",$password)){
                return $result;
            } else {
                return false;
            }

            
        
        }

    }
