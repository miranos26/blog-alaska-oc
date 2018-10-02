<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CommentsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Comments');
    }

    public function index(){
        $tokenDelComment = md5(bin2hex(openssl_random_pseudo_bytes(6)));
        $_SESSION['tokenDelComment'] = $tokenDelComment;
        $comments = $this->Comments->all();
        $this->render('admin.comments.index', compact('comments', 'tokenDelComment'));
    }

    public function delete(){
        if (!empty($_POST)) {
            if(isset($_SESSION['tokenDelComment']) AND isset($_POST['tokenDelComment']) AND !empty($_SESSION['tokenDelComment']) AND !empty($_POST['tokenDelComment'])){
                if($_SESSION['tokenDelComment'] == $_POST['tokenDelComment']){
                    $this->Comments->delete($_POST['id']);
                    header("Location:/blog-alaska-oc/public/admin/commentaires");
                }
            }
        }
    }

}