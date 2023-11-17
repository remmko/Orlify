<?php
use \Emeset\Contracts\Http\Request;
use \Emeset\Contracts\Http\Response;
use \Emeset\Contracts\Container;

    function ctrlLogin(Request $request, Response $response, Container $container) :Response{
       if($_SESSION["auth"]=="true"){
        $response -> redirect("Location: usermod");
        return $response;
       }else{
        $response -> setTemplate("login.php");
        return $response;
       }
        
    }


    function ctrlLogout($request, $response, $container){
        session_destroy();
        $response -> redirect("Location: /");
        return $response;
    }