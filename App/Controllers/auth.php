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
        $response -> redirect("Location: login");
        return $response;
    }
}


function ctrlCheck($request, $response, $container){
    $username = $request ->get(INPUT_POST, "username");
    $name = $request->get(INPUT_POST, "name");
    $surename = $request->get(INPUT_POST, "surname");
    $email = $request->get(INPUT_POST, "email");
    $password = hash("sha256",$request->get(INPUT_POST, "password"));
    $getGroups = $container -> get("groups");
    $getGroups = $getGroups -> getGroups();
    $grups = [];
    for($i=0; $i<count($getGroups); $i++){
        $grups[$i] = $request->get(INPUT_POST, "group".$i); 
    }
    
  

    $register = $container -> get("users");
    $register = $register -> register($username, $name, $surename, $email, $password, $grups, $getGroups);
   
    if($register=="succsesful"){
        $response -> redirect("Location: login");
    }elseif($register == "emailExists"){
        $response -> redirect("Location: register?email=true");
    }elseif($register == "usernameExists"){
        $response -> redirect("Location: register?username=true");
    }
    return $response;
}