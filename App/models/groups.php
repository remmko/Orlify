<?php

namespace App\models;

    class groups{
        public $sql;
        
        public function __construct($sql){
            $this->sql = $sql;
        }


        public function getGroups(){
            $sql = "select * from grups";
            $stm = $this->sql->prepare($sql);
            $stm->execute();
            $tasks = array();
            while ($result = $stm->fetch(\PDO::FETCH_ASSOC)) {
                $tasks[] = $result;
            }
            return $tasks;
           
        }

    }
