<?php
    function ctrlStudent($request, $response, $container){
        if($_SESSION["auth"]=="true"&&$_SESSION["role"]=="student"){
            print_r("True");
            die();
            $getInfo = $container -> get("users");
            
            $result = $getInfo -> getInfo($_SESSION["ID"]);
          
            $response -> setTemplate("studentpanel.php");
            return $response;
        }else{
            $response -> redirect("Location: login");
            return $response;
        }
    }