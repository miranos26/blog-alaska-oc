<?php
namespace App\Entity;

use Core\Entity\Entity;

class ContactEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=admin.contact&id=' . $this->id;
    }

    public function getExcerpt(){
        $html = '<p>' . substr($this->message, 0,50) . '... </p>';
        return $html;
    }

}