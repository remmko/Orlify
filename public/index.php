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
include "../App/Controllers/studentpanel.php";
include "../App/Controllers/teacherpanel.php";
include "../App/Controllers/teacherPanelControls.php";


/* Creem els diferents models */
$contenidor = new \App\Container(__DIR__ . "/../App/config.php");

$app = new \Emeset\Emeset($contenidor);
$app->middleware([\App\Middleware\App::class, "execute"]);

$app->route("", "ctrlIndex");
$app->route("login", "ctrlLogin");
$app->route("auth", "ctrlAuth");
$app->route("usermod", "ctrlMod");
$app->route("studentpanel", "ctrlStudent");
$app->route("logout","ctrlLogout");
$app->route("register", "ctrlRegister");
$app->route("checkregister","ctrlCheck");
$app->route("teacherpanel", "ctrlUCP");
$app->route("teacherpanelcontrols", "ctrlUCPControls");
$app->route("changeUser", "ctrlTeacherPanelControls");


$app->execute();
