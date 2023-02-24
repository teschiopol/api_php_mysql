<?php

class Post{
    private $conn;
    private $table = 'posts';

    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    public function __construct($db){
        $this->conn = $db;
    }

    public function read($id = null){

        $where = '';
        if(!empty($id)){
            $where = "WHERE p.id = '" . $id . "' ";
        }

        $query = "SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
                    FROM " . $this->table . " p LEFT JOIN categories c ON p.category_id = c.id " .
                    $where . 
                    " ORDER by p.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
