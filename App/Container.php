<?php


namespace App;

use Emeset\Container as EmesetContainer;

class Container extends EmesetContainer {

    public function __construct($config){
        parent::__construct($config);

        $dbType = $this->get("config")["db_type"];
       
         
        $this["users"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
            return new \App\models\users($c["db"]->getConnection());
        };

           

        $this["db"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del model i passar-les com a paràmetre.
            return new \App\models\db(
                $c["config"]["db"]["user"],
                $c["config"]["db"]["pass"],
                $c["config"]["db"]["db"], 
                $c["config"]["db"]["host"]
            );
        };
    }
}