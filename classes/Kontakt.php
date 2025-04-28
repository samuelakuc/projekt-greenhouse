<?php
// Kontakt.php

// Zahrnutie triedy Database
include_once 'Database.php';

class Kontakt extends Database {

    // Metóda na pridanie údajov z kontaktného formulára do databázy
    public function pridajKontakt($name, $email, $message) {
        // SQL príkaz INSERT
        $sql = "INSERT INTO formular_kontakt (meno, email, sprava) VALUES (:name, :email, :message)";

        // Parametre pre SQL príkaz
        $params = [
            ':name' => $name,
            ':email' => $email,
            ':message' => $message,
        ];

        // Vykonanie príkazu na vloženie do databázy
        return $this->execute($sql, $params);
    }
}
?>
