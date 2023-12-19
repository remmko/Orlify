<?php

/**
 * Front controler
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Aquest Framework implementa el mínim per tenir un MVC per fer pràctiques
 * de M07.
 * @author: Dani Prados dprados@cendrassos.net
 * @version 0.2.5
 *
 * Punt d'netrada de l'aplicació exemple del Framework Emeset.
 * Per provar com funciona es pot executer php -S localhost:8000 a la carpeta public.
 * I amb el navegador visitar la url http://localhost:8000/
 *
 */

use \Emeset\Contracts\Routers\Router;

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";
include "../App/config.php";
include "../App/Controllers/index.php";
include "../App/Controllers/login.php";
include "../App/Controllers/auth.php";
include "../App/Controllers/usermod.php";
include "../App/Controllers/personaldata.php";
include "../App/Controllers/teacherpanel.php";
include "../App/Controllers/teacherPanelControls.php";
include "../App/Controllers/CSVpanel.php";
include "../App/Controllers/uploadCSV.php";
include "../App/Controllers/getMail.php";
include "../App/Controllers/sendMail.php";
include "../App/Controllers/changePass.php";
include "../App/Controllers/newPass.php";
include "../App/Controllers/changeImage.php";
include "../App/Controllers/updateInfoUser.php";
include "../App/Controllers/error.php";
include "../App/Controllers/managerPanel.php";
include "../App/Controllers/newOrla.php";
include "../App/Controllers/randomUserGenerator.php";
include "../App/Controllers/uploadRandomUser.php";
include "../App/Controllers/changeuser.php";
include "../App/Controllers/orles.php";
include "../App/Controllers/cookies.php";



/* Creem els diferents models */
$contenidor = new \App\Container(__DIR__ . "/../App/config.php");

$app = new \Emeset\Emeset($contenidor);
$app->middleware([\App\Middleware\App::class, "execute"]);

$app->route("", "ctrlIndex");
$app->route("login", "ctrlLogin");
$app->route("auth", "ctrlAuth");
$app->route("usermod", "ctrlMod");
$app->route("logout", "ctrlLogout");
$app->route("register", "ctrlRegister");
$app->route("checkregister", "ctrlCheck");
$app->route("personaldata", "ctrlPersonalData");
$app->route("teacherpanel", "ctrlUCP");
$app->route("changeUser", "ctrlTeacherPanelControls");
$app->route("CSVpanel", "ctrlCSV");
$app->route("upload", "ctrlUploadCSV");
$app->route("getMail", "ctrlGetMail");
$app->post("sendMail", "ctrlSendMail");
$app->route("changePass", "ctrlChangePass");
$app->route("newPass", "ctrlNewPass");
$app->route("changeImage", "ctrlChangeImage");
$app->post("updateInfoUser", "ctrlUpdateInfoUser");
$app->route("error", "ctrlError");
$app->route("personaldata", "ctrlPersonalData");
$app->route("managerpanel", "ctrlManagerPanel");
$app->route("neworla", "ctrlNewOrla");
$app->route("rdmUser", "ctrlRdmUser");
$app->route("uploadRdmUser", "uploadRdmUser");
$app->route("changeinfo", "ctrlChangeUser");
$app->route("changeuserinfo", "ctrlChangeInfo");
$app->route("changeuserimage", "ctrlChangeUserImage");
$app->route("orles", "ctrlOrles");
$app->route("cookies", "ctrlAcceptCookies");


$app->execute();
