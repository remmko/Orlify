<?php
    function ctrlUCP($request, $response, $container){
        if($_SESSION["auth"]=="true"&&$_SESSION["role"]=="teacher"){
           
            $getInfo = $container -> get("users");
            
            $result = $getInfo -> getUnacceptedSudent($_SESSION["ID"]);
           
            $getGroups = $container -> get("groups");
            $groups = $getGroups -> getTeacherGroups($_SESSION["ID"]);

            $users = [];
            for ($i=0; $i < count($groups); $i++) { 
                $studentInfo = $getGroups -> getGroupStudentInfo($groups[$i]["id"]);
                $users[$groups[$i]["id"]] = $studentInfo;

            }

            $response -> set("groups", $groups);
            $response -> set("users", $users);
            $response -> setTemplate("teacherpanel.php");
            $response -> set("result",$result);
            return $response;
        }else{
            $response -> redirect("Location: login");
            return $response;
        }
    }