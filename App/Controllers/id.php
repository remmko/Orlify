<?php
function ctrlId($request, $response, $container)
{
    if ($_SESSION["auth"] == "true") {
        $getInfo = $container->get("users");
        $getInfo = $getInfo->getInfo($_SESSION["ID"]);
        $orles = $container->get('users')->getOrlesPrivate();
        $response->set("orles", $orles);
        $response->set("user", $getInfo);
        $response->setTemplate("id.php");
        return $response;

    } else {
        $response->redirect("Location: login?carnet=true");
        return $response;

    }


}