<?php
// PDO databázové pripojenie
$host = "localhost";
$dbname = "formulár";
$port = 3306;
$username = "root";
$password = "";

// Možnosti

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
);

// Pripojenie PDO

try {
    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname.";port=".$port, $username,
        $password, $options);
} catch (PDOException $e) {
    die("Chyba pripojenia: " . $e->getMessage());
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// SQL príkaz INSERT
$sql = "INSERT INTO udaje (meno, email, sprava) VALUES (:name, :email, :message)";
$statement = $conn->prepare($sql);

$statement->bindParam(':name', $name);
$statement->bindParam(':email', $email);
$statement->bindParam(':message', $message);

try {
    $insert = $statement->execute();
    if ($insert) {
        header("Location: ../thankyou/thankyou.html");
        exit();
    }
} catch (Exception $exception) {
    return false;
}
// Zatvorenie pripojenia
$conn = null;

