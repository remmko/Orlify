<?php
function ctrlChangeUser($request, $response, $container){
    if($_SESSION["auth"]=="true"&&$_SESSION["role"]=="teacher"){
        $getInfo = $container -> get("users");
        if($request->has(INPUT_GET, "studentID")){
            $studentID = $request->get(INPUT_GET, "studentID");
            $users = $getInfo -> getInfo($studentID);
            $group = $request->get(INPUT_GET, "groupID");
            $response -> set("users", $users);
            $response -> set("group", $group);
            $response->setTemplate("changeuser.php");
            return $response;

            
        }else{
            $response -> redirect("Location: teacherpanel");
            return $response;
        }
    }else{
        $response -> redirect("Location: login");
        return $response;
    }
}


function ctrlChangeInfo($request, $response, $container) {
    $name = $request->get(INPUT_POST, "name");
    $last_name = $request->get(INPUT_POST, "last_name");
    $id = $request->get(INPUT_GET, "id");
    $group = $request->get(INPUT_GET, "group");

    $container->get("users")->updateUser($name, $last_name, $id);

    $response->redirect("location: teacherpanel?id=$group");

    return $response;
}

    function ctrlChangeUserImage($request, $response, $container) {

        $getInfo = $container->get("users");
        

        $result = $getInfo->getInfo($_SESSION["ID"]);

        $fileName = $_FILES['avatar']['name'];
        $fileTmpName = $_FILES['avatar']['tmp_name'];

        $uploadDirectory = 'img/';
        $newFilePath = $uploadDirectory . $fileName;

        move_uploaded_file($fileTmpName, $newFilePath);

        $image = $newFilePath;
        $id = $request->get(INPUT_GET, "id");
        $container->get("users")->changeUserImage($image, $id);

        $group = $request->get(INPUT_GET, "group");
        $response->redirect("location: teacherpanel?id=$group");
        return $response;
    }
