<?php function ctrlAuth($request, $response, $container){
    if(isset($_POST["username"])&&$_POST["password"]){
        $auth = $container -> auth();
        $auth = $auth -> auth($_POST["username"], $_POST["password"]);
        print_r($auth);
        die();
    }
}