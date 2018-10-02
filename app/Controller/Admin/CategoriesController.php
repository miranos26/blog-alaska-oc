<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CategoriesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index(){
        $tokenDelCategory = md5(bin2hex(openssl_random_pseudo_bytes(6)));
        $_SESSION['tokenDelCategory'] = $tokenDelCategory;
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items', 'tokenDelCategory'));
    }

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Category->create([
                'title' => $_POST['title'],
            ]);
            return $this->index();
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function edit($request){
        if (!empty($_POST)) {
            $result = $this->Category->update($request['id'], [
                'title' => $_POST['title'],
            ]);
            return $this->index();
        }
        $category = $this->Category->find($request['id']);
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            if(isset($_SESSION['tokenDelCategory']) AND isset($_POST['tokenDelCategory']) AND !empty($_SESSION['tokenDelCategory']) AND !empty($_POST['tokenDelCategory'])){
                if($_SESSION['tokenDelCategory']  == $_POST['tokenDelCategory']){
                    $this->Category->delete($_POST['id']);
                    header("Location:/admin/categories");
                }
            }
        }
    }

}