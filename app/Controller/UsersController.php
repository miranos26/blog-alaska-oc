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

        if(isset($_POST['password'])){
            $auth = new DBAuth(App::getInstance()->getDb());

            $username = stripslashes($_POST['username']);
            $password = stripslashes($_POST['password']);
            $secret = '6LfsEXMUAAAAAACaqxunOpLWrBe0gMNcOTSEZpXZ';
            $response = $_POST['captcha'];
            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
            $captcha_success=json_decode($verify);

            $result = $auth->login($username, $password);

            if ($captcha_success->success == true AND $result !== false) {
                echo json_encode([
                    'userType' => $result,
                    'success' => true
                    ]);
                return;
            }
        }
        echo json_encode(['success' => false]);
    }


    public function add(){
        if (!empty($_POST)) {
            $username = htmlspecialchars($_POST['create-username']);
            $user_email = htmlspecialchars($_POST['user_email']);
            $password = htmlspecialchars(sha1($_POST['create-password']));
            
            $this->User->create([
                'username' => $username,
                'user_email' => $user_email,
                'password' => $password,
                'role' => 'basic_user'
            ]);
        }

        $_SESSION["username"] = $username;
        $_SESSION["user_email"] = $user_email;
        $this->render('users.profile', compact('username', 'user_email', 'password', 'role'));
    }

    public function forbidden(){
        $this->template = 'default';
        $this->render('posts.forbidden');
    }


    public function error(){
        echo'erreur';
        $this->template = 'default';
        $this->render('posts.error');
    }

}