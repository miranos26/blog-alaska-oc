<?php

namespace App;

//Permet de trouver la class PDO qui est à la racine et pas dans le namespace
use \PDO;

Class Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user='root', $db_pass = '', $db_host = 'localhost') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO(){
        //Accesseur qui evite de créer plusieurs connexions simultanés à la BDD
        if($this->pdo === null){
            $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
            //Fait appel aux constantes de PDO pour afficher les erreurs si un problème survient dans une requête sql
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $class_name, $one = false){
        // On stock le resultat de la requête dans une variable result pour pouvoir l'exploiter avec un fetchAll()
        $req = $this->getPDO()->query($statement);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        // Fetch all avec la constante FETCH_OBJ nous retourne chaque entrée sous forme d'objet stdClass
        if($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        // $datas est un tableau d'objet
        return $datas;
    }

    public function prepare($statement, $attributes, $class_name, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

}