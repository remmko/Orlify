<?php
function ctrlNewOrla($request, $response, $container)
{

    $name = $request->get(INPUT_POST, "name");
    $date = $request->get(INPUT_POST, "date");
    $alias = $request->get(INPUT_POST, "aka");


    $container->get("users")->createNewOrla($name, $date, $alias);

    $response->redirect('location: managerpanel');

    return $response;
}