<?php
function ctrlRdmUser($request, $response, $container)
{
    if ($_SESSION["auth"] == "true" && $_SESSION["role"] == "teacher") {
        $grp = $container->get("groups");
        $groups = $grp->getGroups();
        $usr = $container->get("users");
        $users = $usr->getTestUsers();
        $response -> set("grups",$groups);
        $response -> set("testUsers",$users);
        $response->setTemplate("randomUserGenerator.php");
        return $response;
    } else {
        $response->redirect("Location: login");
        return $response;
    }
}
