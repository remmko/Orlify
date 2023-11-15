<?php
    function ctrlIndex($request, $respone, $container){
        $respone -> setTemplate("index.php");
        return $respone;
    }