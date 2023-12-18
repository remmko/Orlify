<?php
function ctrlOrles($request, $response, $container)
{
    $id = $request->get(INPUT_GET, "id");

    $orles = $container->get('users')->getOrles();
    $alumnes = $container->get('users')->getAlumnes($id);
    $teachers = $container->get('users')->getTeachers($id);


    $response->set("orles", $orles);
    $response->set("alumnes", $alumnes);
    $response->set("teachers", $teachers);

    $response->setJson();

    return $response;
}
