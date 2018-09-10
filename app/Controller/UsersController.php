<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 08/09/2018
 * Time: 10:18
 */

namespace App\Controller;

use Core\Auth\DBAuth;
use \App;
use Core\HTML\BootstrapForm;


class UsersController extends AppController {

    public function login(){

    $errors = false;


    if(!empty($_POST)){
        $auth = new DBAuth(App::getInstance()->getDb());
        if($auth->login($_POST['username'], $_POST['password'])){ // Si ça renvoie true, on fait une redirection
            header('Location: index.php?p=admin.posts.index');
        } else {
            $errors = true;
        }
    }
    // Si on l'utilisateur est connecté grâce à $_SESSION, on le redirige directement vers l'admin
        if(isset($auth)){
            if ($auth->logged()){
                header('Location: index.php?p=admin.posts.index');
            }
        }


    $form = new BootstrapForm($_POST);
    $this->render('users.login', compact('form', 'errors'));



    }

}