<?php

namespace App\Controller;

use App;
use Core\Controller\Controller;

class CommentsController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('comments');
    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->comments->create([
                'pseudo' => $_POST['pseudo'],
                'content' => $_POST['content'],
                'post_id' => $_POST['post_id']
            ]);
        }
    }

    public function report() {

        if(!empty($POST)) {

            $this->comments->update($_POST['comment_id'], [
                'reported' => $_POST['reported']
                ]);
        }
    }
}
