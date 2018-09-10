<?php

namespace App;

class Autoloader{

    /**
     * Enregistre notre autoloader dans la pile
     */
    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    /**
     * @param $class string Le nom de la class à charger
     * Si le namespace App\ est en première position dans $class, alors on lance l'autoload
     */
    static function autoload($class){
        if (strpos($class,__NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__. '/' . $class . '.php';
        }
    }
}