<?php

namespace App\models;

class users
{
    public $sql;

    public function __construct($sql)
    {
        $this->sql = $sql;
    }


    public function auth($username, $password)
    {


        $sql = "select id, username, password_hash, avatar, role from users where username =:user;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([':user' => $username]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);


        if (is_array($result) && $result["password_hash"] == hash("sha256", $password)) {
            return $result;
        } else {
            return false;
        }
    }



    public function tokenExists($token)
    {
        $sql = "SELECT reset_token FROM users WHERE reset_token = :token";

        $stm = $this->sql->prepare($sql);
        $stm->execute([":token" => $token]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);



        if (is_array($result) && $result["reset_token"] == $token) {
            return true;
        } else {
            return false;
        }
    }


    public function getInfo($userID)
    {


        $sql = "select * from users where id =:userID;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([':userID' => $userID]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }


    public function getUserID($username)
    {


        $sql = "select id from users where username = :username;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([':username' => $username]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }



    public function register($username, $name, $surename, $email, $password, $grups, $getGroups, $filename)
    {

        $sql = "select username, email from users";
        $stm = $this->sql->prepare($sql);

        $stm->execute();
        $tasks = array();

        while ($result = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $result;
        }


        for ($i = 0; $i < count($tasks); $i++) {
            if ($tasks[$i]["username"] == $username) {
                return "usernameExists";
            } else if ($tasks[$i]["email"] == $email) {
                return "emailExists";
            }
        }

        $sql = "INSERT INTO users (name, last_name, username, password_hash, email, role, avatar) 
            VALUES (:name, :surename, :username, :pass, :email,  :role, :route);";


        try {
            $stmt = $this->sql->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':surename' => $surename,
                ':username' => $username,
                ':pass' => $password,
                ':email' => $email,
                ':role' => "undifined",
                ':route' => "img/" . $filename
            ]);
        } catch (PDOException $e) {
            echo "Registration error: " . $e->getMessage();
        }


        $getID = $this->getUserID($username);

        for ($i = 0; $i < count($grups); $i++) {
            if ($grups[$i] != null) {
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
    public function toStudent($userID)
    {
        $sql = "UPDATE users SET role = 'student' WHERE id = :userID;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([':userID' => $userID]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function acceptStudent($userID, $grupID)
    {
        $sql1 = "UPDATE user_grups SET aproved = 1 WHERE user_id = :userID AND grup_id = :grupID;";

        $stm = $this->sql->prepare($sql1);

        $stm->execute([':userID' => $userID, ':grupID' => $grupID]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        $toStudent = $this->toStudent($userID);

        if ($toStudent) {
            return $result;
        }
    }

    public function denyStudent($userID, $grupID)
    {
        $sql = "DELETE FROM user_grups WHERE user_id = :userID AND grup_id = :grupID;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([':userID' => $userID, ':grupID' => $grupID]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getUnacceptedSudent($teacherID)
    {
        $sql = "SELECT u.id AS user_ID, u.username, u.name, u.last_name, u.email, u.avatar, g.id AS grup_ID, g.grup_name, g.grup_teacher FROM users u JOIN user_grups ug ON ug.user_id = u.id JOIN grups g ON g.id = ug.grup_id WHERE ug.aproved = 0 AND g.grup_teacher = :teacherID;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([':teacherID' => $teacherID]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    // Function to check if the 'username' is unique
    public function isUsernameUnique($username)
    {
        $sql = "SELECT username FROM users WHERE username = :username;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([':username' => $username]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            return false;
        } else {
            return true;
        }
    }

    // Function to check if the 'email' is unique
    public function isEmailUnique($email)
    {
        $sql = "SELECT email FROM users WHERE email = :email;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([':email' => $email]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function isAliasCorrect($alias)
    {
        $sql = "SELECT id FROM grups WHERE alias = :alias;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([':alias' => $alias]);

        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function uploadGrupUser($userID, $grupID)
    {
        $sql = "INSERT INTO user_grups (user_id, grup_id, aproved) VALUES (:userID, :grupID, 1);";
        $stm = $this->sql->prepare($sql);
        $stm->execute([
            ':userID' => $userID["id"],
            ':grupID' => $grupID
        ]);

        return true;
    }

    public function uploadCSVUserData($csvData)
    {
        $alias = $csvData[6];
        $resultAlias = $this->isAliasCorrect($alias);
        $grupID = $resultAlias[0]["id"];
        if (count($resultAlias) > 0) {
            $password = hash("sha256", $csvData[2]);
            $sql = "INSERT INTO users (name, last_name, username, password_hash, email, role) VALUES (:name, :last_name, :username, :pwd_hash, :email, :role);";
            $stm = $this->sql->prepare($sql);
            $stm->execute([
                ':name' => $csvData[0],
                ':last_name' => $csvData[1],
                ':username' => $csvData[5],
                ':pwd_hash' => $password,
                ':email' => $csvData[3],
                ':role' => "student"
            ]);
            $getUserID = $this->getUserID($csvData[5]);
            $uploadGrupUser = $this->uploadGrupUser($getUserID, $grupID);

            if ($uploadGrupUser) {
                return true;
            } else {
                echo "L'usuari '$csvData[5]' no s'ha afegit correctament a la classe '$csvData[6]'.\n";
                return false;
            }
        } else {
            return false;
        }
    }

    public function voidRole($csvData)
    {
        $alias = $csvData[6];
        $resultAlias = $this->isAliasCorrect($alias);
        $grupID = $resultAlias[0]["id"];
        $getUserID = $this->getUserID($csvData[5]);
        $uploadGrupUser = $this->uploadGrupUser($getUserID, $grupID);
        if (count($resultAlias) > 0) {
            if ($uploadGrupUser) {
                return true;
            } else {
                echo "L'usuari '$csvData[5]' no s'ha afegit correctament a la classe '$csvData[6]'.\n";
                return false;
            }
        } else {
            return false;
        }
    }


    public function getIdByEmail($email)
    {
        $sql = "SELECT id FROM users WHERE email = :email;";

        $stm = $this->sql->prepare($sql);

        $stm->execute([":email" => $email]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function token($token, $idArray)
    {
        $sql = "UPDATE users SET reset_token = :token WHERE id = :id";

        $stm = $this->sql->prepare($sql);

        // I do this because if not it get and error because an array
        $id = reset($idArray);

        $stm->execute([":token" => $token, ":id" => $id]);
    }


    public function getUserByToken($token)
    {
        $sql = "SELECT * FROM users WHERE reset_token = :token";

        $stm = $this->sql->prepare($sql);

        $stm->execute([":token" => $token]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function changePass($password, $id)
    {
        $sql = "UPDATE users SET password_hash = :password, reset_token = NULL WHERE id = :id";

        $stm = $this->sql->prepare($sql);

        $stm->execute([":password" => $password, ":id" => $id]);
    }


    public function changeImage($avatar)
    {
        $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";

        $stm = $this->sql->prepare($sql);
        $stm->execute([":avatar" => $avatar, ":id" => $_SESSION["ID"]]);
    }

    public function changeUserImage($avatar, $id)
    {
        $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";

        $stm = $this->sql->prepare($sql);
        $stm->execute([":avatar" => $avatar, ":id" => $id]);
    }


    public function updateInfoUser($name, $last_name)
    {
        $sql = "UPDATE users SET name = :name, last_name = :last_name WHERE id = :id";

        $stm = $this->sql->prepare($sql);
        $stm->execute([":name" => $name, ":last_name" => $last_name, ":id" => $_SESSION["ID"]]);
    }
    
    public function updateUser($name, $last_name, $id)
    {
        $sql = "UPDATE users SET name = :name, last_name = :last_name WHERE id = :id";

        $stm = $this->sql->prepare($sql);
        $stm->execute([":name" => $name, ":last_name" => $last_name, ":id" => $id]);
    }


    public function getOrles()
    {
        $sql = "SELECT * FROM grups";

        $stm = $this->sql->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }


    public function getTeachers($id)
    {
        $sql = "SELECT u.* FROM users u where u.id IN (SELECT g.grup_teacher FROM grups g WHERE g.id = :id);";

        $stm = $this->sql->prepare($sql);
        $stm->execute([":id" => $id]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }


    public function getAlumnes($id)
    {
        $sql = "SELECT u.* FROM users u WHERE u.id IN (SELECT ug.user_id FROM user_grups ug WHERE ug.grup_id = :id AND ug.aproved = 1);";

        $stm = $this->sql->prepare($sql);
        $stm->execute([":id" => $id]);
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }


    public function createNewOrla($name, $date, $alias)
    {
        $sql = "INSERT INTO grups (grup_name, creation_year, alias) VALUES (:name, :date, :alias)";

        $stm = $this->sql->prepare($sql);
        $stm->execute([":name" => $name, ":date" => $date, ":alias" => $alias]);
    }

    public function uploadTestUsers($role, $name, $surname, $email, $username, $avatar)
    {
        $password = hash("sha256", "testing10");
        $sql = "INSERT INTO users (name, last_name, username, password_hash, email, role, avatar, isTestUser) VALUES (:name, :last_name, :username, :pwd_hash, :email, :role, :avatar, 1);";
        $stm = $this->sql->prepare($sql);
        $stm->execute([
            ':name' => $name,
            ':last_name' => $surname,
            ':username' => $username,
            ':pwd_hash' => $password,
            ':email' => $email,
            ':role' => $role,
            ':avatar' => $avatar
        ]);
        $result = true;

        return $result;
    }
}
