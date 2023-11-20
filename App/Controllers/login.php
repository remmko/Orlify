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


    function ctrlRegister($request, $response, $container){
        if(isset($_GET["email"])&&$_GET["email"]=="true"){
            $email = true;
            $response -> set("email", $email);
        }

        if(isset($_GET["username"])&&$_GET["username"]=="true"){
            $username = true;
            $response -> set("username", $username);

        }
        
        $response -> setTemplate("register.php");
        return $response;
    }