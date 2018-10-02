<?php
namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity{

    public $featured_image;

    public function getUrl(){
        return '/article/' . $this->id;
    }

    public function getExcerpt(){
        $html = '<p>' . substr($this->content, 0,200) . '... </p>';
        $html .= '<p><a href=" '. $this->getUrl() . ' "> Lire la suite </a> </p>';
        return $html;
    }

    public function getFeatured_image(){

    }

    public function getCategory_id(){

    }

}