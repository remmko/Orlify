<?php
    function ctrlGetMail($request, $response, $container) {
        
        $response -> setTemplate("getMail.php");
        return $response;
    }