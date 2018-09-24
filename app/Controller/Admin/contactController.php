<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class ContactController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Contact');
        $this->loadModel('Newsletter');
    }

    public function index()
    {
        $messages = $this->Contact->all();
        $this->render('admin.contact.index', compact('messages'));
    }


    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Contact->delete($_POST['id']);
            return $this->newsletter();
        }
    }

    public function newsletterDeleteEntry(){
        if (!empty($_POST)) {
            $this->Newsletter->delete($_POST['id']);
            return $this->newsletter();
        }
    }

    public function show()
    {
        $message = $this->Contact->find($_GET['id']);
        $this->render('admin.contact.show', compact('message'));
    }

    public function newsletter()
    {
        $subscription = $this->Newsletter->all();
        $this->render('admin.contact.newsletter', compact('subscription'));
    }

}