<?php
function uploadRdmUser($request, $response, $container)
{
    $json_data = file_get_contents('php://input');

    $usr = $container->get("users");

    // Decode the JSON data
    $data = json_decode($json_data, true);

    $role = $data['form']['userType'];
    $name = $data['randomUser']['name']['first'];
    $surname = $data['randomUser']['name']['last'];
    $email = $data['randomUser']['email'];
    $username = $data['randomUser']['login']['username'];
    $avatar = $data['randomUser']['picture']['large'];
    $grups = $data['form']['grups'];

    $uploadedUsers = $usr->uploadTestUsers($role, $name, $surname, $email, $username, $avatar);
    if ($uploadedUsers) {
        echo "a";
        $idByMail = $usr->getIdByEmail($email);
        echo $idByMail[0]['id'];
        foreach ($grups as $grup) {
            $uploadedGroups = $usr->uploadGrupUser($idByMail, $grup);
        }
    } else {
        echo "b";
        $response->set("message", "Error al crear l'usuari");
    }

    $response->setTemplate("randomUserGenerator.php");
    return $response;
}
