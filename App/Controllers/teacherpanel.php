<?php
function ctrlTeacher($request, $response, $container){
    $response->setTemplate("teacherpanel.php");
    return $response;
}