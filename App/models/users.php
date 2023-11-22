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


        public function getUserID($username){
            

            $sql = "select id from users where username = :username;";

            $stm = $this->sql->prepare($sql);

            $stm->execute([':username'=>$username]);
            $result = $stm->fetch(\PDO::FETCH_ASSOC);
      
            return $result;
        
        }


        public function register($username, $name, $surename, $email, $password, $route, $grups, $getGroups){

            $sql = "select username, email from users";
            $stm = $this->sql->prepare($sql);

            $stm->execute();
            $tasks = array();
            while ($result = $stm->fetch(\PDO::FETCH_ASSOC)) {
                $tasks[] = $result;
            }

            
            for($i = 0; $i < count($tasks); $i++){
                if($tasks[$i]["username"]==$username){
                    return "usernameExists";
                }else if($tasks[$i]["email"]==$email){
                    return "emailExists";
                }
            }

            $sql = "INSERT INTO users (name, last_name, username, password_hash, email, avatar, role) 
            VALUES (:name, :surename, :username, :pass, :email, :img, :role);";


            try {
                $stmt = $this->sql->prepare($sql);
                $stmt->execute([
                    ':name' => $name,
                    ':surename' => $surename,
                    ':username'=>$username,
                    ':pass'=>$password,
                    ':email'=>$email,
                    ':img'=>$route,
                    ':role'=> "undifined" 
                ]);

                
               
            } catch (PDOException $e) {
                echo "Registration error: " . $e->getMessage();
            } 


            $getID = $this-> getUserID($username);
         
            for ($i = 0; $i < count($grups); $i++){
                if($grups[$i] != null){
                    $sql = "INSERT INTO user_grups (user_id, grup_id, aproved) VALUES (:userID, :grupID, 0);";
                    $stmt = $this->sql->prepare($sql);
                    $stmt->execute([
                        ':userID' => $getID["id"],
                        ':grupID' => $getGroups[$i]["id"]
                    ]);
                }
              
            }

         
            return "succsesful";

        }

    }
