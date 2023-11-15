<?php

return [
    /* configuració de connexió a la base dades */
    /* Path on guardarem el fitxer sqlite */
    "mysql" => [
        "host" => Emeset\Env::get("host", "projectdb.ddns.net"),
        "db" => Emeset\Env::get("db", "orlify"),
        "user" => Emeset\Env::get("user", "admin"),
        "pass" => Emeset\Env::get("pass","opensource")
    ],
    /* Nom de la cookie */
    "cookie" => [
        "name" => Emeset\Env::get("cookie_name", 'visites')
    ],
    "login" => [
        "usuari" => Emeset\Env::get("login_usuari", "dani"),
        "clau" => Emeset\Env::get("login_clau", "1234")
    ],
    "app" => [
        "name" => Emeset\Env::get("app_name", "Emeset demo"),
        "version" => Emeset\Env::get("app_version", "0.2.5")
    ]
];

/** 
 * Fitxer de configuració de l'aplicació.
 * */ 



/**
 * Carreguem les classes del Framework Emeset
 */

use \Emeset\Container;
use \Emeset\Request;
use \Emeset\Response;

/**
 * Carreguem els models de l'aplicació
 */
include "models/db.php";
include "models/users.php";
