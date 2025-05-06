<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

require_once '../../classes/FAQ.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faq = new FAQ();
    $faq->createFaq($_POST['question'], $_POST['answer']);
    header('Location: index.php');
    exit;
}
?>

<h1>Pridať FAQ</h1>
<form method="POST">
    <label>Otázka:</label><br>
    <input type="text" name="question" required><br><br>

    <label>Odpoveď:</label><br>
    <textarea name="answer" required></textarea><br><br>

    <button type="submit">Uložiť</button>
</form>

<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

require_once '../../classes/FAQ.php';
$faq = new FAQ();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faq->updateFaq($_POST['id'], $_POST['question'], $_POST['answer']);
    header('Location: index.php');
    exit;
}

$existing = $faq->getFaqById($_GET['id'])[0];
?>
