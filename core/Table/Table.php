<?php

namespace Core\Table;

use Core\Database\Database;

class Table
{

    protected $table;
    protected $db;

    public function __construct(Database $db) // Injection de dépendance avec la Database : on a besoin de la connexion à la BDD (envoyée par App->GetTable())
    {
        $this->db = $db;
        // Récupère le nom de la table à partir du nom de la Class reçu depuis le Factory dans App.php (ex : PostTable -> Posts)
        if (is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name) . 's');
        }
    }

    public function all()
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }

    public function find($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id= ?", [$id], true);
    }

    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }
}




