<?php

namespace Models;

use Database;
use PDO;

class MoodLog {
    private $conn;
    private $table_name = "mood_logs";

    public $id;
    public $user_id;
    public $mood_level; // 1-5 (Sad -> Happy)
    public $energy_level; // 1-5 (Low -> High)
    public $note;
    public $created_at;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->ensureTableExists();
    }

    private function ensureTableExists() {
        $sql = "CREATE TABLE IF NOT EXISTS " . $this->table_name . " (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            mood_level INT NOT NULL,
            energy_level INT NOT NULL,
            note TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $this->conn->exec($sql);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET user_id=:user_id, mood_level=:mood_level, energy_level=:energy_level, note=:note";
        
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->note = htmlspecialchars(strip_tags($this->note));

        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":mood_level", $this->mood_level);
        $stmt->bindParam(":energy_level", $this->energy_level);
        $stmt->bindParam(":note", $this->note);

        return $stmt->execute();
    }

    public function getHistory($user_id, $limit = 7) {
        $query = "SELECT * FROM " . $this->table_name . " 
                  WHERE user_id = :user_id 
                  ORDER BY created_at DESC LIMIT :limit";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id, $user_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id AND user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $user_id);
        return $stmt->execute();
    }
}
