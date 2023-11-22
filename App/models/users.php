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

        public function toStudent($userID){
            $sql = "UPDATE users SET role = 'student' WHERE id = :userID;";

            $stm = $this->sql->prepare($sql);

            $stm->execute([':userID'=>$userID]);
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
      
            return $result;
        }

        public function acceptStudent($userID, $grupID) {
            $sql1 = "UPDATE user_grups SET aproved = 1 WHERE user_id = :userID AND grup_id = :grupID;";

            $stm = $this->sql->prepare($sql1);

            $stm->execute([':userID'=>$userID, ':grupID'=>$grupID]);
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

            $toStudent = $this->toStudent($userID);

            if($toStudent){
                return $result;
            }
      

        }

        public function denyStudent($userID, $grupID) {
            $sql = "DELETE FROM user_grups WHERE user_id = :userID AND grup_id = :grupID;";

            $stm = $this->sql->prepare($sql);

            $stm->execute([':userID'=>$userID, ':grupID'=>$grupID]);
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
      
            return $result;

        }

        public function getUnacceptedSudent($teacherID) {
            $sql = "SELECT u.id AS user_ID, u.username, u.name, u.last_name, u.email, u.avatar, g.id AS grup_ID, g.grup_name, g.grup_teacher FROM users u JOIN user_grups ug ON ug.user_id = u.id JOIN grups g ON g.id = ug.grup_id WHERE ug.aproved = 0 AND g.grup_teacher = :teacherID;";

            $stm = $this->sql->prepare($sql);

            $stm->execute([':teacherID'=>$teacherID]);
            $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
      
            return $result;

        }

    }
