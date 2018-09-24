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
                if($user['role'] === 'admin'){
                    $userType = 'admin';
                    return $userType;
                } elseif($user['role'] === 'basic_user'){
                    $userType = 'basic_user';
                    return $userType;
                }
            }
        }
        return false;
    }

    public function logged(){
        return isset($_SESSION['auth']);
    }


}