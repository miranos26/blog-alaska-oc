<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index(){
        $this->loadModel('Category');
        $this->loadModel('Comments');
        $this->loadModel('User');
        $users = $this->User->all();
        $categories = $this->Category->extract('id', 'title');
        $comments= $this->Comments->extract('id', 'pseudo', 'content', 'date_comment', 'post_id', 'reported');

        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts', 'categories', 'comments', 'users'));
    }

    public function upload($index, $destination, $maxsize = FALSE, $extensions = FALSE){
        //Test 1 : fichier correctement uploadé
        if(!isset($_FILES[$index]) OR $_FILES[$index]['error']> 0) return FALSE;
        // Test 2 : Taille limite
        if($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
        // Test 3 : extension
        $ext = strtolower(substr(strrchr($_FILES[$index]['name'], '.'),1));
        if ($extensions !== FALSE AND !in_array($ext, $extensions)) return FALSE;
        // Déplacement
        return move_uploaded_file($_FILES[$index]['tmp_name'], $destination);


    }

    public function add(){

        if(!empty($_FILES)){
            $extensions_images_valid = array('jpg', 'jpeg', 'gif', 'png');
            $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));

            $fileName = 'img/postsImages/' .uniqid(). '.'. $extension_upload;
            $this->upload('image', $fileName  , 4194304000, $extensions_images_valid);
        }

        if (!empty($_POST)) {
            $this->Post->create([
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'category_id' => $_POST['category_id'],
                'featured_image' => $fileName
            ]);
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'title');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form'));

    }

    public function edit(){
        if(!empty($_FILES)){
            $extensions_images_valid = array('jpg', 'jpeg', 'gif', 'png');
            $extension_upload = strtolower(substr(strrchr($_FILES['image']['name'], '.'),1));

            $fileName = 'img/postsImages/' .uniqid(). '.'. $extension_upload;
            $this->upload('image', $fileName  , 4194304000, $extensions_images_valid);
        }

        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'category_id' => $_POST['category_id'],
                 'featured_image' => $fileName
            ]);
            if($result){
                return $this->index();
            }
        }
        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'title');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }

}