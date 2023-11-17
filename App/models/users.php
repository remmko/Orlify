<?php

namespace App\models;

    class users{
        public $sql;
        
        public function __construct($sql){
            $this->sql = $sql;
        }


        public function auth($username, $password){
            

            $sql = "select id, username, password_hash, role from users where username =:user;";

            $stm = $this->sql->prepare($sql);

            $stm->execute([':user'=>$username]);
            $result = $stm->fetch(\PDO::FETCH_ASSOC);
      

            if(is_array($result) && $result["password_hash"] == hash("sha256",$password)){
                return $result;
            } else {
                return false;
            }

            
        
        }


        public function getInfo($userID){
            

            $sql = "select name, last_name, email, avatar from users where id =:userID;";

            $stm = $this->sql->prepare($sql);

            $stm->execute([':userID'=>$userID]);
            $result = $stm->fetch(\PDO::FETCH_ASSOC);
      
            return $result;

            
        
        }

    }
