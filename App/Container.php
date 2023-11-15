<?php


namespace App;

use Emeset\Container as EmesetContainer;

class Container extends EmesetContainer {

    public function __construct($config){
        parent::__construct($config);
        
        $this["\App\Controllers\Privat"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Privat($c);
        };


        $this["mysql"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            $user = $c["config"]["mysql"]["user"];
            $pass = $c["config"]["mysql"]["pass"];
            $db = $c["config"]["mysql"]["db"];
            $host = $c["config"]["mysql"]["host"];

            return new \App\models\db($user, $pass, $db, $host);
        };


    }



    
    public function auth(){
        return new \App\models\users($this->sql);
    }
}