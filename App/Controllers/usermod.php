<?php 
    function ctrlMod($request, $response, $container){
     
        if($_SESSION["auth"]=="true"){
            if($_SESSION["role"]=="student"){
                $response -> redirect("Location: studentpanel");
                return $response;
            }elseif($_SESSION["role"]=="teacher"){
                $response -> redirect("Location: teacherpanel");
                return $response;
            }elseif($_SESSION["role"]=="manager"){
                $response -> redirect("Location: teacherpanel");
                return $response;
            }elseif($_SESSION["role"]=="admin"){
                $response -> redirect("Location: adminpanel");
                return $response;
            }
        }else{
            $response -> redirect("Location: login");
            return $response;
        }
    }