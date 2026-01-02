<?php
namespace Models;

use Database;
use PDO;

class Post {
    private $conn;
    private $table_name = "posts";

    public $id;
    public $user_id;
    public $content;
    public $category;
    public $created_at;
    public $user_name; // Joined field

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET user_id=:user_id, content=:content, category=:category";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->category = htmlspecialchars(strip_tags($this->category));

        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":category", $this->category);

        return $stmt->execute();
    }

    public function readAll() {
        $query = "SELECT p.id, p.content, p.category, p.created_at, u.name as user_name 
                  FROM " . $this->table_name . " p
                  LEFT JOIN users u ON p.user_id = u.id
                  ORDER BY p.created_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
