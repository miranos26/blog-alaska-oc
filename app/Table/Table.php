<?php

namespace App\Table;

use App\App;

class Table{

    public static function find($id){
        return static::query("
            SELECT *
            FROM " . static::$table . "
            WHERE id = ?
            ", [$id], true);
    }

    public static function query($statement, $attributes = null, $one = false){
        if($attributes){
            return App::getDatabase()->prepare($statement, $attributes, get_called_class(), $one);

        } else {
            return App::getDatabase()->query($statement, get_called_class(), $one);
        }
    }

    public static function all()
    {
        return App::getDatabase()->query("
            SELECT *
            FROM " . static::$table . "
            ", get_called_class());
    }

    // Methode magique qui remplace une fonction appellée qui n'existe pas par une autre fonction (permet d'appeller nos GETTERS proprement dans les views)
    public function __get($key){
        $method = 'get' . ucfirst($key);
        //$Method sera automatiquement remplacée par la bonne methode. On stock le retour en variable d'instance pour ne pas que ça soit appellé tout le temps
        $this->$key = $this->$method();
        return $this->$key;
    }


}