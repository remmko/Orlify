<?php

namespace App\models;

class groups
{
    public $sql;

    public function __construct($sql)
    {
        $this->sql = $sql;
    }


    public function getGroups()
    {
        $sql = "select * from grups";
        $stm = $this->sql->prepare($sql);
        $stm->execute();
        $tasks = array();
        while ($result = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $result;
        }
        return $tasks;

    }

    public function getTeacherGroups($id)
    {
        $sql = "select * from grups where grup_teacher = :id";
        $stm = $this->sql->prepare($sql);
        $stm->execute([
            ":id" => $id
        ]);
        $tasks = array();
        while ($result = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $result;
        }
        return $tasks;
    }


    public function getGroupStudentInfo($grupID)
    {
        $sql = "SELECT * from users JOIN user_grups u WHERE u.grup_id = :grupID and id = u.user_id and u.aproved = 1;";
        $stm = $this->sql->prepare($sql);
        $stm->execute([
            ":grupID" => $grupID
        ]);
        $tasks = array();
        while ($result = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $tasks[] = $result;
        }
        return $tasks;

    }


}