<?php

// Zahrnutie triedy Kontakt
include_once '../classes/Kontakt.php';

// Vytvorenie inštancie triedy Kontakt
$kontakt = new Kontakt();

// Získanie údajov z formulára
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

try {
    $insert = $kontakt->pridajKontakt($name, $email, $message);


    if ($insert) {
        header("Location: ../thankyou/thankyou.html");
        exit();
    }
} catch (Exception $exception) {
    die("Chyba: " . $exception->getMessage());
}

