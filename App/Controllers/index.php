<?php
function ctrlIndex($request, $response, $container)
{
    // $orles = $container->get('users')->getOrles();
    // $professors = $container->get('users')->getProfessors();
    // $alumnes = $container->get('users')->getAlumnes();

    // $response->set('orles', $orles);
    // $response->set('professors', $professors);
    // $response->set('alumnes', $alumnes);

    $response->setTemplate('index.php');
    return $response;
}

