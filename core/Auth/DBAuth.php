<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    private $db;

    //Injection de dépendance, le constructeur a besoin d'une connexion à la BDD pour fonctionner
    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password){

        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], '', true);
        if($user){
            if($user['password'] === sha1($password)){
                $_SESSION['auth'] = $user['id'];
                $_SESSION['token'] = md5(bin2hex(openssl_random_pseudo_bytes(6)));

                return $user['role'];
            }
        }
        return false;
    }


    public function connexionNumber($ip){
        $recherche = $this->db->prepare('SELECT * FROM connexion WHERE ip = ?', [$ip], '', true);
        return $recherche;
    }

    public function logged(){
        return isset($_SESSION['auth']);
    }


}