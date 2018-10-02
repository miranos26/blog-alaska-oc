<?php

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';

if(!array_key_exists('path', $_GET)){
    $_GET['path'] = '';
}

App::load();

$router = new \Core\Router\Router();

$router->addRoute('homepage', '', 'posts', 'index');
$router->addRoute('login', 'login', 'users', 'login');
$router->addRoute('article_show', 'article/(?<id>[0-9]+)', 'posts', 'show');
$router->addRoute('article_list', 'articles/liste', 'posts', 'postslist');
$router->addRoute('category', 'categorie/(?<id>[0-9]+)', 'posts', 'postlist');

$router->addRoute('comment_add', 'article/addComment', 'comments', 'add');
$router->addRoute('comment_report', 'article/report', 'comments', 'report');

$router->addRoute('newsletter_Suscribe', 'newsletter-suscribe', 'contact', 'suscribe');
$router->addRoute('contactForm', 'contact', 'contact', 'send');


// Admin

if(array_key_exists('auth', $_SESSION)){
    $router->addRoute('homepage_Admin', 'admin', 'admin\Posts', 'index');
    $router->addRoute('Add_Post_Admin', 'admin/articles/creer', 'admin\Posts', 'add');
    $router->addRoute('Edit_Post_Admin', 'admin/article/editer/(?<id>[0-9]+)', 'admin\Posts', 'edit');
    $router->addRoute('Delete_Post_Admin', 'admin/article/supprimer/(?<id>[0-9]+)', 'admin\Posts', 'delete');

    $router->addRoute('Categories_Admin', 'admin/categories', 'admin\Categories', 'index');
    $router->addRoute('Add_Category_Admin', 'admin/categorie/creer', 'admin\Categories', 'add');
    $router->addRoute('Edit_Category_Admin', 'admin/categorie/editer/(?<id>[0-9]+)', 'admin\Categories', 'edit');
    $router->addRoute('Delete_Category_Admin', 'admin/categorie/supprimer/(?<id>[0-9]+)', 'admin\Categories', 'delete');

    $router->addRoute('Comments_Admin', 'admin/commentaires', 'admin\Comments', 'index');
    $router->addRoute('Delete_Comment_Admin', 'admin/commentaires/supprimer/(?<id>[0-9]+)', 'admin\Comments', 'delete');


    $router->addRoute('Contact_Admin', 'admin/messages', 'admin\Contact', 'index');
    $router->addRoute('Contact_Admin', 'admin/messages/(?<id>[0-9]+)', 'admin\Contact', 'show');
    $router->addRoute('Contact_Admin', 'admin/messages/supprimer/(?<id>[0-9]+)', 'admin\Contact', 'delete');

    $router->addRoute('Contact_Newsletter', 'admin/newsletter', 'admin\Contact', 'newsletter');
    $router->addRoute('Contact_Newsletter_DeleteEntry', 'admin/newsletter/delete/(?<id>[0-9]+)', 'admin\Contact', 'newsletterDeleteEntry');


    $router->addRoute('Deconnexion', 'admin/deconnexion', 'admin\Users', 'disconnect');

} else{
    $router->addRoute('Admin_forbidden', 'admin^[a-zA-Z0-9_.-/]*$', 'users', 'forbidden');
}

$route = $router->match($_GET['path']);

if($route){
    $controller = 'App\Controller\\' . ucfirst($route['controller']) . 'Controller';
    $controller = new $controller();
    $method = $route['method'];
    $controller->$method($route['matches']);
} else {
    header("location:/blog-alaska-oc/public");
}
