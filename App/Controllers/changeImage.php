<?php
    function ctrlChangeImage($request, $response, $container) {

        $getInfo = $container->get("users");

        $result = $getInfo->getInfo($_SESSION["ID"]);

        $fileName = $_FILES['avatar']['name'];
        $fileTmpName = $_FILES['avatar']['tmp_name'];

        $uploadDirectory = 'img/';
        $newFilePath = $uploadDirectory . $fileName;

        move_uploaded_file($fileTmpName, $newFilePath);

        $image = $newFilePath;
        $container->get("users")->changeImage($image);

        // update the image from the nav bar
        $_SESSION["img"] = $image;

        $response->redirect("location: personaldata");
        $response->set("result", $result);
        return $response;
    }
