<?php
function ctrlManagerPanel($request, $response, $container)
{
    $response->setTemplate('managerPanel.php');
    return $response;
}
