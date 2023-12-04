<?php
function ctrlCSV($request, $response, $container)
{
    if ($_SESSION["auth"] == "true" && $_SESSION["role"] == "teacher") {
        $users = $container->get("groups");
        $groups = $users->getGroups();
        $response -> set("groups",$groups);
        $response->setTemplate("CSVpanel.php");
        return $response;
    } else {
        $response->redirect("Location: login");
        return $response;
    }
}
