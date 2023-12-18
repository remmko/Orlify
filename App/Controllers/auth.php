<?php

function ctrlAuth($request, $response, $container)
{
    $username = $request->get(INPUT_POST, "username");
    $password = $request->get(INPUT_POST, "password");

    $auth = $container->get("users");
    $login = $auth->auth($username, $password);

    if ($login) {
        $response->setSession("auth", "true");
        $response->setSession("ID", $login["id"]);
        $response->setSession("role", $login["role"]);
        $response->setSession("img", $login["avatar"]);
        $response->redirect("Location: /");
        return $response;

    } else {
        $response->redirect("Location: login?faliure=true");
        return $response;
    }
}


function ctrlCheck($request, $response, $container)
{
    $username = $request->get(INPUT_POST, "username");
    $name = $request->get(INPUT_POST, "name");
    $surename = $request->get(INPUT_POST, "surname");
    $email = $request->get(INPUT_POST, "email");
    $img = $request->get(INPUT_POST, "file2");
    $file = $request->get("FILES", "file");
    $password = hash("sha256", $request->get(INPUT_POST, "password"));
    $getGroups = $container->get("groups");
    $getGroups = $getGroups->getGroups();
    $grups = [];




    $data = explode(',', $img);

    $file = base64_decode($data[1]);

    $filename = "avatar_" . $username . "." . "png";

    try {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/img/" . $filename, $file);


    } catch (Exception $e) {
        echo "Error to add photo";
    }



    if (file_exists($_FILES['file']['tmp_name'])) {
        $img = $_FILES['file']['name'];
        $img_tmp = $_FILES['file']['tmp_name'];
        move_uploaded_file($img_tmp, "img/$img");
        $filename = $img;
    }

    for ($i = 0; $i < count($getGroups); $i++) {
        $grups[$i] = $request->get(INPUT_POST, "group" . $i);
    }





    $register = $container->get("users");
    $register = $register->register($username, $name, $surename, $email, $password, $grups, $getGroups, $filename);

    if ($register == "succsesful") {
        $response->redirect("Location: login");
    } elseif ($register == "emailExists") {
        $response->redirect("Location: register?email=true");
    } elseif ($register == "usernameExists") {
        $response->redirect("Location: register?username=true");
    }
    return $response;
}