<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: admin_dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Overenie prihlasovacích údajov
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['user'] = $username;
        header('Location: admin_dashboard.php');
        exit;
    } else {
        $error_message = "Neplatné prihlasovacie údaje!";
    }
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prihlásenie</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<h2>Prihlásenie do administrácie</h2>
<?php if (isset($error_message)): ?>
    <p style="color:red;"><?php echo $error_message; ?></p>
<?php endif; ?>
<form method="POST">
    <label for="username">Používateľské meno:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Heslo:</label>
    <input type="password" name="password" id="password" required><br>

    <button type="submit">Prihlásiť sa</button>
</form>

<div class="button-container">
<a href="../index.php">
    <button type="button" class="back-btn">Späť na stránku</button>
</a>
</div>
</body>
</html>
