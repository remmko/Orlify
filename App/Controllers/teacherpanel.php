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
                $users[$i] = $studentInfo;

            }


            if($request->has(INPUT_GET, "id")){
                $id = $request->get(INPUT_GET, "id");
                $response -> set("users", $users[$id]);
                $response -> set("id", $id);
                
            }

            $response -> set("groups", $groups);
            $response -> setTemplate("teacherpanel.php");
            $response -> set("result",$result);
            return $response;
        }else{
            $response -> redirect("Location: login");
            return $response;
        }
    }