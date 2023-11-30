<?php
    function ctrlPersonalData($request, $response, $container){
        if($_SESSION["auth"]=="true"){

            $getUserInfo = $container -> get("users");
            $getUserInfo = $getUserInfo -> getInfo($_SESSION["userID"]);
            $response -> set("userInfo", $getUserInfo);
            $response -> setTemplate("personaldata.php");
            return $response;
        }else{
            $response -> redirect("Location: login");
            return $response;
        }
    }