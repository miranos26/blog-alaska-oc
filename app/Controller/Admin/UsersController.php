<?php

namespace App\Controller\Admin;

class UsersController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
    }

    public function disconnect(){
        session_destroy();
        header("Location:/blog-alaska-oc/public");
    }

}