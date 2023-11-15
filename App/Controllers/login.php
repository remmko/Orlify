<?php
    function ctrlLogin($request, $respone, $conatiner){
        $respone -> setTemplate("login.php");
        return $respone;
    }