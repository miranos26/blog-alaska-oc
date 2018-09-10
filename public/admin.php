<?php

use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
// Appel App.php qui est le coeur de l'application
require ROOT . '/app/App.php';
// Méthode qui va faire un session_start et charger les 2 autoloaders
App::load();

if(isset($_GET['p'])){
    $page = $_GET['p'];
} else{
    $page = 'home';
}

