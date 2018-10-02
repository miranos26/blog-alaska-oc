<?php

namespace App\Controller;
use App;

class ContactController extends AppController{


    public function __construct(){
        parent::__construct();
        $this->loadModel('contact');
        $this->loadModel('newsletter');
    }

    public function send()
    {
        if (!empty($_POST)) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            $this->contact->create([
                'name' => $name,
                'email' => $email,
                'message' => $message
            ]);
        }
    }

    public function suscribe(){

        if(!empty($_POST)){
            $name = htmlspecialchars($_POST['newsName']);
            $email = htmlspecialchars($_POST['newsEmail']);

            $this->newsletter->create([
                'name' => $name,
                'email' => $email
            ]);
        }
    }

}