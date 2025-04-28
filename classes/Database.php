<?php
// Database.php

// Zahrnutie konfiguračného súboru
include_once '../database/db_config.php';

class Database {
    private $conn = null;

    // Konstruktor, ktorý sa pripojí k databáze
    public function __construct() {
        try {
            $this->conn = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . DB_PORT,
                DB_USER,
                DB_PASSWORD,
                PDO_OPTIONS
            );
        } catch (PDOException $e) {
            die("Chyba pripojenia: " . $e->getMessage());
        }
    }

    // Metóda na získanie pripojenia
    public function getConnection() {
        return $this->conn;
    }

    // Metóda na vykonanie SQL dotazu (pre SELECT)
    public function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Metóda na vykonanie INSERT, UPDATE, DELETE
    public function execute($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }

    // Zatvorenie pripojenia
    public function closeConnection() {
        $this->conn = null;
    }
}
?>
