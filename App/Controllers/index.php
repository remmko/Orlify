<?php
function ctrlIndex($request, $response, $container)
{
    $cookiesAccepted = $request->get(INPUT_COOKIE, "cookiesAccepted");

    $cookiesAccepted = isset($cookiesAccepted) ? $cookiesAccepted : false;
    $response->set("cookiesAccepted", $cookiesAccepted);

    $orlesPublic = $container->get('users')->getOrlesPublic();

    $response->set("orlesPublic", $orlesPublic);

    $response->setJson();

    $response->setTemplate('index.php');
    return $response;
}

