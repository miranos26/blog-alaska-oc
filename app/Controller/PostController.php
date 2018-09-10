<?php

namespace App\Controller;
use App;
use Core\Controller\Controller;

class PostController extends AppController{

    public function index(){
        $posts = App::getInstance()->getTable('Post')->last();
        $categories = App::getInstance()->getTable('Category')->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function category(){
        $categorie = App::getInstance()->getTable('Category')->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $articles = App::getInstance()->getTable('Post')->lastByCategory($_GET['id']);
        $categories = App::getInstance()->getTable('Category')->all();
        $this->render('posts.category', compact('articles', 'categories', 'categorie'));
    }

    public function show(){
        $article = App::getInstance()->getTable('Post')->findWithCategory($_GET['id']);
        $this->render('posts.show', compact('article'));
    }

}