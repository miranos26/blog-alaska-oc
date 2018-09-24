<?php

namespace App\Table;
use Core\Table\Table;

class CommentsTable extends Table
{

    protected $table = 'comments';

    /**
     * Récupère les derniers articles
     * @return array
     */
    public function last()
    {
        return $this->query("
        SELECT comments.id, comments.pseudo, comments.content, comments.date_comment, comments.post_id, comments.reported as comments
        FROM comments
        LEFT JOIN posts ON comments.post_id = posts.id
        ORDER BY comments.date_comment DESC");
    }

}