<?php
    function ctrlNewPass($request, $response, $container) {

        $token = $request->get(INPUT_POST, "token");
        $pass = $request->get(INPUT_POST, "password");
    
        $userId = $container->get("users")->getUserByToken($token)["id"];


        $pass = hash("sha256", $pass);

        $container->get("users")->changePass($pass, $userId);


        $response->redirect("location: /");

        return $response;
        
    }