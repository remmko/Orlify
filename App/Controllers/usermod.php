<?php 
    function ctrlMod($request, $response, $container){
     
        if($_SESSION["auth"]=="true"){
            if($_SESSION["role"]=="student"){
                $link = "Location: studentpanel";
            }elseif($_SESSION["role"]=="teacher"){
                $link = "Location: teacherpanel";
            }elseif($_SESSION["role"]=="manager"){
                $link = "Location: teacherpanel";
            }elseif($_SESSION["role"]=="admin"){
                $link = "Location: adminpanel";
            }
        }else{
            $link = "Location: login";
        }

        $response -> redirect($link);
        return $response;
    }