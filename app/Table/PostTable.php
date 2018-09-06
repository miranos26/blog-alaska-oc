<?php

namespace App\Table;
use Core\Table\Table;

class PostTable extends Table{

    protected $table = 'posts';

    /**
     * Récupère les derniers articles
     * @return array
     */
    public function last(){
        return $this->query("
        SELECT posts.id, posts.title, posts.content, posts.date, category.title as categorie
        FROM posts
        LEFT JOIN category ON category_id = category.id
        ORDER BY posts.date DESC");
    }

    /**
     * Récupère les derniers articles de la categorie demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id){
        return $this->query("
        SELECT posts.id, posts.title, posts.content, posts.date, category.title as categorie
        FROM posts
        LEFT JOIN category ON category_id = category.id
        WHERE posts.category_id = ?
        ORDER BY posts.date DESC", [$category_id]);
    }

    /**
     * Récupère un article en liant la catégorie associée
     * @return \App\Entity\PostEntity
     * @param $id int
     */
    public function find($id){
        return $this->query("
        SELECT posts.id, posts.title, posts.content, posts.date, category.title as categorie
        FROM posts
        LEFT JOIN category ON category_id = category.id
        WHERE posts.id = ?", [$id], true);
    }

}