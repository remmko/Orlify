<?php
    function ctrlUCP($request, $response, $container){
        if($_SESSION["auth"]=="true"&&$_SESSION["role"]=="teacher"){
           
            $getInfo = $container -> get("users");
            
            $result = $getInfo -> getUnacceptedSudent($_SESSION["ID"]);

          
            $response -> setTemplate("teacherpanel.php");
            $response -> set("result",$result);
            return $response;
        }else{
            $response -> redirect("Location: login");
            return $response;
        }
    }