<?php
    function ctrlPersonalData($request, $response, $container){
        if($_SESSION["auth"]=="true"){
            $getInfo = $container -> get("users");
            $userInfo = $getInfo -> getInfo($_SESSION["ID"]);
            $response -> set("userInfo", $userInfo);

            $response -> setTemplate("personaldata.php");
            return $response;
        }else{
            $response -> redirect("Location: login");
            return $response;
        }
    }