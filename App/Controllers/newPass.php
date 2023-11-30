<?php
    function ctrlNewPass($request, $response, $container) {

        $token = $request->get(INPUT_POST, "token");
        $pass = $request->get(INPUT_POST, "password");
    
        $userId = $container->get("users")->getUserByToken($token)["id"];


        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $container->get("users")->changePass($pass, $userId);


        $response->redirect("location: /");

        return $response;
        
    }