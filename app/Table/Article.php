<?php

namespace App\Table;

class Article{


    // Methode magique qui remplace une fonction appellée qui n'existe pas par une autre fonction (permet d'appeller nos GETTERS proprement dans les views)
    public function __get($key){
        $method = 'get' . ucfirst($key);
        //$Method sera automatiquement remplacée par la bonne methode. On stock le retour en variable d'instance pour ne pas que ça soit appellé tout le temps
        $this->$key = $this->$method();
        return $this->$key;
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