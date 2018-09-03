<?php

namespace App\Table;

use App\App;

class Article extends Table {

    protected static $table = 'posts';

    public static function find($id){
        return self::query("
            SELECT posts.id, posts.title, posts.content, categories.title as categorie 
            FROM posts 
            LEFT JOIN categories ON posts.category_id = categories.id 
            WHERE posts.id = ?
            ", [$id], true);
    }

    public static function getLast(){
        return self::query("
            SELECT posts.id, posts.title, posts.content, categories.title as categorie 
            FROM posts 
            LEFT JOIN categories ON posts.category_id = categories.id
            ORDER BY posts.date DESC
            ");
    }

    public static function lastByCategory($category_id){
        return self::query("
            SELECT posts.id, posts.title, posts.content, categories.title as categorie 
            FROM posts 
            LEFT JOIN categories 
              ON posts.category_id = categories.id
              WHERE category_id = ? 
              ORDER BY posts.date DESC
            ", [$category_id]);
    }

    public function getUrl(){
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExcerpt(){
        $html = '<p>' . substr($this->content,0,250) . '...</p>';
        $html .= '<p><a href=""' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}