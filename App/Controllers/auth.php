<?php 




function ctrlAuth($request, $response, $container){
    
    
    $username = $request -> get(INPUT_POST, "username");
    $password = $request -> get(INPUT_POST, "password");

    $auth = $container -> get("users");
    $login = $auth -> auth($username, $password);

    if($login){
        $response -> setSession("auth", "true");
        $response -> setSession("ID", $login["id"]);
        $response -> setSession("role", $login["role"]);
        $response -> redirect("Location: usermod");
        return $response;
        
    }else{
        $response -> setSession("auth", "false");
        $response -> redirect("Location: login");
        return $response;
    }
        
       
    
}