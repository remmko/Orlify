<?php
function ctrlIndex($request, $response, $container)
{
    $orles = $container->get('users')->getOrles();


    $response->set('orles', $orles);

    $response->setTemplate('index.php');
    return $response;
}
