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
            $this->contact->create([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'message' => $_POST['message']
            ]);
        }
    }

    public function suscribe(){

        if(!empty($_POST)){
            $this->newsletter->create([
                'name' => $_POST['newsName'],
                'email' => $_POST['newsEmail']
            ]);
        }
    }

}