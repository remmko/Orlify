<?php

function ctrlAcceptCookies($request, $response, $container)
{
    $response->setCookie("cookiesAccepted", true, time() + 3600, "/");


    $response->redirect("location: index.php");

    return $response;
}