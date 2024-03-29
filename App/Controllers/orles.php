<?php
function ctrlOrles($request, $response, $container)
{
    $id = $request->get(INPUT_GET, "id");

    $orlesPrivate = $container->get('users')->getOrlesPrivate();
    $alumnes = $container->get('users')->getAlumnes($id);
    $teachers = $container->get('users')->getTeachers($id);

    $response->set("alumnes", $alumnes);
    $response->set("teachers", $teachers);
    $response->set("orlesPrivate", $orlesPrivate);


    $response->setJson();

    return $response;
}
