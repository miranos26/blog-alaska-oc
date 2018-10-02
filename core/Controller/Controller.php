<?php

namespace Core\Controller;

use App\Views\ViewFunction;

class Controller{

    protected $viewPath;
    protected $template;



    protected function render($view, $variables = []){
        ob_start();
        $functions = new ViewFunction();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    public function forbidden(){
       $this->template = 'default';
       $this->render('posts.forbidden');
    }

    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

}