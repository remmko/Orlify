<?php
function ctrlNewOrla($request, $response, $container)
{

    $name = $request->get(INPUT_POST, "name");
    $date = $request->get(INPUT_POST, "date");


    $container->get("users")->createNewOrla($name, $date);

    $response->redirect('location: managerpanel');

    return $response;
}