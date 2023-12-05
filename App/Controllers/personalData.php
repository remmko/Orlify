<?php
    function ctrlPersonalData($request, $response, $container) {
        if($_SESSION["auth"] == "true") {
           
            $getInfo = $container->get("users");
            
            $result = $getInfo->getInfo($_SESSION["ID"]);

          
            $response->setTemplate("personalData.php");
            $response->set("result", $result);
            return $response;
        } else {
            $response -> redirect("Location: login");
            return $response;
        }
    }