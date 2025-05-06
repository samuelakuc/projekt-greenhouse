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

<h1>Upraviť FAQ</h1>
<form method="POST">
    <input type="hidden" name="id" value="<?= $existing['id'] ?>">

    <label>Otázka:</label><br>
    <input type="text" name="question" value="<?= htmlspecialchars($existing['question']) ?>" required><br><br>

    <label>Odpoveď:</label><br>
    <textarea name="answer" required><?= htmlspecialchars($existing['answer']) ?></textarea><br><br>

    <button type="submit">Uložiť zmeny</button>
</form>
