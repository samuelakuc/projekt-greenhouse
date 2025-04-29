<?php
require_once '../classes/Database.php';

class EmployeeImport {
    private $conn;
    private $table = "employees";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Metóda na import zamestnancov do databázy
    public function importEmployees() {
        // Pole s informáciami o zamestnancoch zo stránky
        $employees = [
            [
                'name' => 'Jennifer Soft',
                'position' => 'Founder and CEO',
                'description' => 'Vivamus cursus leo nec sem feugiat sagittis.',
                'image' => 'about-01.jpg',
                'facebook' => 'https://fb.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com'
            ],
            [
                'name' => 'Daisy Walker',
                'position' => 'Executive Chef',
                'description' => 'Praesent non vulputate elit. Orci varius natoque et magnis dis parturient.',
                'image' => 'about-02.jpg',
                'facebook' => 'https://fb.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com'
            ],
            [
                'name' => 'Florence Nelson',
                'position' => 'Kitchen Manager',
                'description' => 'Aenean sapien sem, ultricies sed vulputate et, auctor vel mauris. Integer sit amet diam eget est facilisis lacinia vitae.',
                'image' => 'about-03.jpg',
                'facebook' => 'https://fb.com',
                'instagram' => 'https://instagram.com'
            ],
            [
                'name' => 'Valentina Martin',
                'position' => 'Culinary Director',
                'description' => 'Praesent non vulputate elit. Orci varius natoque penatibus et magnis montes, nascetur ridiculus mus.',
                'image' => 'about-04.jpg',
                'facebook' => 'https://fb.com',
                'twitter' => 'https://twitter.com',
                'instagram' => 'https://instagram.com',
                'youtube' => 'https://youtube.com'
            ],
        ];

        foreach ($employees as $employee) {
            $query = "INSERT INTO " . $this->table . " (name, position, description, image, facebook_link, twitter_link, instagram_link) 
                      VALUES (:name, :position, :description, :image, :facebook, :twitter, :instagram)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':name', $employee['name']);
            $stmt->bindParam(':position', $employee['position']);
            $stmt->bindParam(':description', $employee['description']);
            $stmt->bindParam(':image', $employee['image']);
            $stmt->bindParam(':facebook', $employee['facebook']);
            $stmt->bindParam(':twitter', $employee['twitter']);
            $stmt->bindParam(':instagram', $employee['instagram']);

            if (!$stmt->execute()) {
                echo "Chyba pri vkladaní zamestnanca " . $employee['name'] . ".<br>";
            }
        }

        echo "Všetci zamestnanci boli úspešne importovaní!";
    }
}

$import = new EmployeeImport();
$import->importEmployees();
