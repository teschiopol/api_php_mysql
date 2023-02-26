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

    public function create(): bool {
        $query = "INSERT INTO " . $this->table . " SET title = :title, category_id = :category_id, body = :body, author = :author";
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $stmt->bindParam(':title', $this->title);
        $this->body = htmlspecialchars(strip_tags($this->body));
        $stmt->bindParam(':body', $this->body);
        $this->author = htmlspecialchars(strip_tags($this->author));
        $stmt->bindParam(':author', $this->author);
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $stmt->bindParam(':category_id', $this->category_id);

        if($stmt->execute()){
            return true;
        }

        printf("Error %s", $stmt->error);
        return false;
    }

    public function update(): bool {
        $query = "UPDATE " . $this->table . " SET title = :title, category_id = :category_id, body = :body, author = :author 
        WHERE id = :id ";
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $stmt->bindParam(':title', $this->title);
        $this->body = htmlspecialchars(strip_tags($this->body));
        $stmt->bindParam(':body', $this->body);
        $this->author = htmlspecialchars(strip_tags($this->author));
        $stmt->bindParam(':author', $this->author);
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $stmt->bindParam(':category_id', $this->category_id);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
            return true;
        }

        printf("Error %s", $stmt->error);
        return false;
    }

    public function delete(){
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()){
            return true;
        }

        printf("Error %s", $stmt->error);
        return false;
    }
}
