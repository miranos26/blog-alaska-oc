<?php

namespace App\Controller;
use App;
use Core\Controller\Controller;

class PostsController extends AppController{


    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comments');
    }

    public function index(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function category(){
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $articles = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('articles', 'categories'));
    }

    public function show(){

        $comments = $this->Comments->last();
        $article = $this->Post->findWithCategory($_GET['id']);
        $this->render('posts.show', compact('article', 'comments'));
    }

    public function postslist(){
        $posts = $this->Post->all();
        $categories = $this->Category->all();
        $this->render('posts.postslist', compact('posts', 'categories'));
    }
    
}