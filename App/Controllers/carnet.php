<?php

function ctrlCarnet($request, $response, $container)
{

    $response->setTemplate("carnet.php");
    return $response;
}