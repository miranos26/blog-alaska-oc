<?php

namespace Core;

//Class qui gère les configurations de notre site sous forme de Singleton pour n'avoir qu'une seule instance dans toute l'Application
class Config {

    private $settings = []; //Tableau qui va récupérer les données de l'Array dans Config/config.php grâce à __construct
    private static $_instance; // Va stocker l'instance de notre Class Config si elle a déjà été initialisée

    // On recupère le tableau de settings du fichier config.php et on le met dans la variable $settings
    public function __construct($file) {
        $this->settings = require($file);
    }

    // Partie Singleton qui permet de récupérer dans toute l'application une seule instance de la classe Config
    public static function getInstance($file){
        if(is_null(self::$_instance)){
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    // Méthode qui permet de récupérer les clefs de notre config dans l'array $settings
    public function get($key){
        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }
}