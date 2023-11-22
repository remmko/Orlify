<?php
    function ctrlTeacherPanelControls($request, $response, $container){
        if($_SESSION["auth"]=="true"&&$_SESSION["role"]=="teacher"){
           
            // $userID = $request->get(INPUT_POST, "user_id");

            // $action = $request->get(INPUT_POST, "selectedAction");

            // $grupID = $request->get(INPUT_POST, "grup_id");

            $userID = isset($_POST["userID"]) ? $_POST["userID"] : null;
            $action = isset($_POST["selectedData"]) ? $_POST["selectedData"] : null;
            $grupID = isset($_POST["grupID"]) ? $_POST["grupID"] : null;

            $getInfo = $container -> get("users");

            $i = 0;
            
            foreach($userID as $user){
                if($action[$i] == "Accept"){
                    $getInfo -> acceptStudent($user, $grupID[$i]);
                } else if($action[$i] == "Deny"){
                    $getInfo -> denyStudent($user, $grupID[$i]);
                }
                $i++;
            }
          
            
            $result = $getInfo -> getUnacceptedSudent($_SESSION["ID"]);

            $response -> set("result",$result);

            $response -> setTemplate("teacherpanel.php");
            //  
            return $response;
        }else{
            $response -> redirect("Location: login");
            return $response;
        }
    }