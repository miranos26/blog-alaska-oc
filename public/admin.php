<?php

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

ob_start();

if($page === 'home'){
    require ROOT . '/pages/admin/posts/home.php';
} elseif ($page ==='posts.category'){
    require ROOT . '/pages/admin/posts/category.php';
}elseif ($page ==='posts.show'){
    require ROOT . '/pages/admin/posts/show.php';
}

$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';