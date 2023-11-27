<?php
    function ctrlCSV($request, $response, $container){
        if($_SESSION["auth"]=="true"&&$_SESSION["role"]=="teacher"){
            $response -> setTemplate("CSVpanel.php");
            return $response;
        }else{
            $response -> redirect("Location: login");
            return $response;
        }
    }