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
        $tokenDelMessage = md5(bin2hex(openssl_random_pseudo_bytes(6)));
        $_SESSION['tokenDelMessage'] = $tokenDelMessage;
        $this->render('admin.contact.index', compact('messages', 'tokenDelMessage'));
    }


    public function delete()
    {
        if (!empty($_POST)) {
            if(isset($_SESSION['tokenDelMessage']) AND isset($_POST['tokenDelMessage']) AND !empty($_SESSION['tokenDelMessage']) AND !empty($_POST['tokenDelMessage'])){
                if($_SESSION['tokenDelMessage'] == $_POST['tokenDelMessage']){
                    $this->Contact->delete($_POST['id']);
                    header("Location:/blog-alaska-oc/public/admin/messages");
                }
            }
        }
    }

    public function newsletterDeleteEntry(){
        if (!empty($_POST)) {
            if(isset($_SESSION['tokenDelEntry']) AND isset($_POST['tokenDelEntry']) AND !empty($_SESSION['tokenDelEntry']) AND !empty($_POST['tokenDelEntry'])){
                if($_SESSION['tokenDelEntry'] == $_POST['tokenDelEntry']){
                    $this->Newsletter->delete($_POST['id']);
                    return $this->newsletter();
                }
            }
        }
    }

    public function show($request)
    {
        $message = $this->Contact->find($request['id']);
        $this->render('admin.contact.show', compact('message'));
    }

    public function newsletter()
    {
        $subscription = $this->Newsletter->all();
        $tokenDelEntry= md5(bin2hex(openssl_random_pseudo_bytes(6)));
        $_SESSION['tokenDelEntry'] = $tokenDelEntry;
        $this->render('admin.contact.newsletter', compact('subscription', 'tokenDelEntry'));
    }

}