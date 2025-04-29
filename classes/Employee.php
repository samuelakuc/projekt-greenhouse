<?php
require_once 'Database.php';

class Employee {
    private $conn;
    private $table = "employees"; // Názov tabuľky v databáze

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Create
    public function createEmployee($name, $position, $description, $image, $facebook, $twitter, $instagram, $youtube) {
        $query = "INSERT INTO " . $this->table . " (name, position, description, image, facebook_link, twitter_link, instagram_link, youtube_link) 
                  VALUES (:name, :position, :description, :image, :facebook_link, :twitter_link, :instagram_link, :youtube_link)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':facebook_link', $facebook);
        $stmt->bindParam(':twitter_link', $twitter);
        $stmt->bindParam(':instagram_link', $instagram);
        $stmt->bindParam(':youtube_link', $youtube);

        return $stmt->execute();
    }

    // Read
    public function getAllEmployees() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Update
    public function updateEmployee($id, $name, $position, $description, $image, $facebook, $twitter, $instagram, $youtube) {
        $query = "UPDATE " . $this->table . " 
                  SET name = :name, position = :position, description = :description, image = :image, 
                      facebook_link = :facebook_link, twitter_link = :twitter_link, 
                      instagram_link = :instagram_link, youtube_link = :youtube_link 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':facebook_link', $facebook);
        $stmt->bindParam(':twitter_link', $twitter);
        $stmt->bindParam(':instagram_link', $instagram);
        $stmt->bindParam(':youtube_link', $youtube);

        return $stmt->execute();
    }

    // Delete
    public function deleteEmployee($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

        public function getEmployeeById($id) {
            $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt;
        }

}

