<?php
function ctrlManagerPanel($request, $response, $container)
{

    if($_SESSION["auth"]==true&&$_SESSION["rol"]=="manager"){
        $response->setTemplate('managerPanel.php');
        return $response;
    }else{
        $response->setTemplate('error.php');
        return $response;
    }
    
}
