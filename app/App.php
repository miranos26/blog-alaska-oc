<?php

use Core\Config;
use Core\Database\MysqlDatabase;

// Class Factory
class App {

    public $title = 'Jean Forteroche | Blog';
    private $db_instance;
    private static $_instance; //  L'attribut qui stockera l'instance unique

    // La méthode statique qui permet d'instancier ou de récupérer l'instance unique -> Singleton Pattern
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    // Factory qui permet de récupérer dynamiquement le nom complet d'une Class dans le namespace Table et de l'instancier
    public function getTable($name){
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb()); // On passe en paramètre l'instance de la connexion à la BDD pour l'injection de dépendance dans nos tables ($db)
    }

    // Factory qui va charger la configuration de la BDD, la lire puis retourner une instance
    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php'); // Charge notre singleton
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'),$config->get('db_host'));
        }
        return $this->db_instance;
    }


}