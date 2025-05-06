<?php
require_once __DIR__ . '/../database/db_config.php';
require_once __DIR__ . '/../classes/Database.php';
class FAQ extends Database {
    private Database $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllFaqs() {
        return $this->db->query("SELECT * FROM faqs");
    }

    public function getFaqById($id) {
        return $this->db->query("SELECT * FROM faqs WHERE id = ?", [$id]);
    }

    public function createFaq($question, $answer) {
        return $this->db->execute("INSERT INTO faqs (question, answer) VALUES (?, ?)", [$question, $answer]);
    }

    public function updateFaq($id, $question, $answer) {
        return $this->db->execute("UPDATE faqs SET question = ?, answer = ? WHERE id = ?", [$question, $answer, $id]);
    }

    public function deleteFaq($id) {
        return $this->db->execute("DELETE FROM faqs WHERE id = ?", [$id]);
    }
}
