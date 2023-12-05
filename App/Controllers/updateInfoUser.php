<?php
    function ctrlUpdateInfoUser($request, $response, $container) {
        $name = $request->get(INPUT_POST, "name");
        $last_name = $request->get(INPUT_POST, "last_name");


        $container->get("users")->updateInfoUser($name, $last_name);

        $response->redirect("location: personaldata");

        return $response;
    }