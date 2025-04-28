<?php

// Zahrnutie triedy Kontakt
include_once '../classes/Kontakt.php';

// Vytvorenie inštancie triedy Kontakt
$kontakt = new Kontakt();

// Získanie údajov z formulára
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// Pokus o pridanie kontaktu do databázy
try {
    $insert = $kontakt->pridajKontakt($name, $email, $message);

    // Ak bolo vloženie úspešné, presmerujeme užívateľa
    if ($insert) {
        header("Location: ../thankyou/thankyou.html");
        exit();
    }
} catch (Exception $exception) {
    // Chyba pri vykonávaní SQL príkazu
    die("Chyba: " . $exception->getMessage());
}

