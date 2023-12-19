<?php
function ctrlPublic($request, $response, $container)
{
    $id = $request->get(INPUT_GET, "id");


    $orlesPublic = $container->get('users')->getOrlesPublic();
    $alumnes = $container->get('users')->getAlumnes($id);
    $teachers = $container->get('users')->getTeachers($id);


    $response->set("alumnes", $alumnes);
    $response->set("teachers", $teachers);
    $response->set("orlesPublic", $orlesPublic);

    $response->setJson();

    return $response;
}
