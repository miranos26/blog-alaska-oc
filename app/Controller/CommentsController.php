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
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $content = htmlspecialchars($_POST['content']);
            $post_id = htmlspecialchars($_POST['id']);

            $this->comments->create([
                'pseudo' => $pseudo,
                'content' => $content,
                'post_id' => $post_id
            ]);
        }
    }

    public function report() {

        if(!empty($_POST)) {

            $this->comments->update($_POST['comment_id'], [
                'reported' => $_POST['reported']
                ]);
        }
    }
}
