<?php
    function ctrlChangePass($request, $response, $container) {
        $token = $request->get(INPUT_GET, "token");
        $tokenExists = $container-> get("users");
        $tokenExists = $tokenExists->tokenExists($token);

        if ($tokenExists) {
            $response->set("token", $token);
            $response->setTemplate("changePass.php");
            return $response;
        }else{
            $response->redirect("Location: error");
            return $response;
        }
        
        
    }