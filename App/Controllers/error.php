<?php  
    function ctrlError($request, $response, $container) {
        $response->setTemplate("error.php");
        return $response;
    }