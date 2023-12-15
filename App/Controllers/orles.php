<?php
function ctrlOrles($request, $response, $container)
{
    $id = $request->get(INPUT_GET, "id");


    $orles = $container->get('users')->getOrles();
    $alumnes = $container->get('users')->getAlumnes($id);



    $response->set("alumnes", $alumnes);
    $response->set("orles", $orles);

    $response->setJson();

    return $response;
}


