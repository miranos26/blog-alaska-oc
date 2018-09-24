<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends AppController {

    protected $logs;

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');

    }

    public function login()
    {
        $success = false;

        if(isset($_POST['password'])){
            $auth = new DBAuth(App::getInstance()->getDb());
            $username = $_POST['username'];
            $password = $_POST['password'];

            if($auth->login($username, $password)){
                $success = true;
            }
        }
        //Echo en Json pour que le JS puisse le lire (return marche pas)
        echo json_encode(['success' => $success]);
    }

    public function suscribe(){
        $this->render('users.index');
    }

    public function add(){
        if (!empty($_POST)) {
            $username = htmlspecialchars($_POST['username']);
            $user_email = htmlspecialchars($_POST['user_email']);
            $password = htmlspecialchars(sha1($_POST['password']));
            $role = 'basic_user';
            
            $this->User->create([
                'username' => $username,
                'user_email' => $user_email,
                'password' => $password,
                'role' => $role
            ]);
        }
        $this->render('users.profile', compact('username', 'user_email', 'password', 'role'));
    }
}