<?php 
    function ctrlMod($request, $response, $container){
     
        if($_SESSION["auth"]=="true"){
            if($_SESSION["role"]=="student"){
                $response -> redirect("Location: personaldata");
                return $response;
            }elseif($_SESSION["role"]=="teacher"){
                $link = "Location: teacherpanel";
            }elseif($_SESSION["role"]=="manager"){
                $link = "Location: teacherpanel";
            }elseif($_SESSION["role"]=="admin"){
                $link = "Location: adminpanel";
            }else{
                $link = "Location: index.php";
            }
        }else{
            $link = "Location: login";
        }

        $response -> redirect($link);
        return $response;
    }