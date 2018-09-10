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

if($page === 'home'){
    $controller = new \App\Controller\PostController();
    $controller->index();
} elseif ($page ==='posts.category'){
    $controller = new \App\Controller\PostController();
    $controller->category();
}elseif ($page ==='posts.show'){
    $controller = new \App\Controller\PostController();
    $controller->show();
}elseif ($page ==='login'){
    $controller = new \App\Controller\UsersController();
    $controller->login();
} elseif( $page === 'admin.posts.index'){
    $controller = new \App\Controller\Admin\PostController();
    $controller->index();
}elseif( $page === 'admin.posts.edit') {
    $controller = new \App\Controller\Admin\PostController();
    $controller->index();
}