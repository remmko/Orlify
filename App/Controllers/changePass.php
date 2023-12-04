<?php
    function ctrlChangePass($request, $response, $container) {

        $token = $request->get(INPUT_GET, "token");
        
        // send the token to the view
        $response->set("token", $token);

        $response->setTemplate("changePass.php");

        return $response;
        
    }