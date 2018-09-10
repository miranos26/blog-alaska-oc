<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use App;

class PostController extends AppController{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $posts = App::getInstance()->getTable('Post')->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add(){
        if (!empty($_POST)) {
            $result = App::getInstance()->getTable('Post')->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->index();
            }
        }
        $categories = App::getInstance()->getTable('Category');
        $categories->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = App::getInstance()->getTable('Post')->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->index();
            }
        }
        $post = App::getInstance()->getTable('Post')->find($_GET['id']);
        $categories = App::getInstance()->getTable('Category');
        $categories->extract('id', 'titre');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = App::getInstance()->getTable('Post')->delete($_POST['id']);
            return $this->index();
        }
    }

}