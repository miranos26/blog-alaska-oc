<?php
namespace App\Entity;

use Core\Entity\Entity;

class newsletterEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=admin.contact.newsletter&id=' . $this->id;
    }

}