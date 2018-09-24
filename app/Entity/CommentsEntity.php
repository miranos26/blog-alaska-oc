<?php
namespace App\Entity;

use Core\Entity\Entity;

class CommentsEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.comments&id=' . $this->id;
    }

}