<?php

namespace Core\Controller;

use Core\Auth\DBAuth;
use App;

class Controller{

    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    protected function forbidden(){
        $auth = new DBAuth(App::getInstance()->getDb());
        if($auth->logged()){
            header('Location: index.php?p=admin.posts.index');
        } else {
            header('Location: index.php?p=login');
        }

    }

    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}