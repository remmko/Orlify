<?php
    function ctrlStudent($request, $response, $container) {
        if($_SESSION["auth"] == "true" && $_SESSION["role"] == "student"){
           
            $getInfo = $container->get("users");
            
            $result = $getInfo->getInfo($_SESSION["ID"]);

          
            $response->setTemplate("studentpanel.php");
            $response->set("result", $result);
            return $response;
        } else {
            $response -> redirect("Location: login");
            return $response;
        }
    }