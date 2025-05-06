<?php
session_start();
require_once '../../classes/FAQ.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../../login.php');
    exit;
}

$faqClass = new FAQ();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = $_POST['question'] ?? '';
    $answer = $_POST['answer'] ?? '';
    $id = $_POST['id'] ?? null;

    if ($id) {
        $faqClass->updateFaq($id, $question, $answer);
    } else {
        $faqClass->createFaq($question, $answer);
    }

    header("Location: admin_faqs.php");
    exit;
}

if (isset($_GET['delete'])) {
    $faqClass->deleteFaq($_GET['delete']);
    header("Location: admin_faqs.php");
    exit;
}

$faqData = null;
if (isset($_GET['edit'])) {
    $faqArray = $faqClass->getFaqById($_GET['edit']);
    $faqData = $faqArray[0] ?? null;
}

$faqs = $faqClass->getAllFaqs();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Správa FAQ</title>
    <link rel="stylesheet" href="../../css/admin_dashboard.css">
</head>
<body>
<h2>Správa často kladených otázok (FAQ)</h2>
<a href="../admin_dashboard.php">Späť na správu zamestnancov</a> |
<a href="../logout.php">Odhlásiť sa</a>

<h3><?php echo $faqData ? 'Upraviť otázku' : 'Pridať novú otázku'; ?></h3>

<form method="POST">
    <?php if ($faqData): ?>
        <input type="hidden" name="id" value="<?php echo $faqData['id']; ?>">
    <?php endif; ?>
    <input type="text" name="question" placeholder="Otázka" value="<?php echo $faqData['question'] ?? ''; ?>" required><br>
    <textarea name="answer" placeholder="Odpoveď" required><?php echo $faqData['answer'] ?? ''; ?></textarea><br>
    <button type="submit"><?php echo $faqData ? 'Upraviť' : 'Pridať'; ?></button>
</form>

<h3>Zoznam otázok</h3>
<table border="1">
    <tr>
        <th>Otázka</th>
        <th>Odpoveď</th>
        <th>Akcie</th>
    </tr>
    <?php foreach ($faqs as $faq): ?>
        <tr>
            <td><?php echo htmlspecialchars($faq['question']); ?></td>
            <td><?php echo htmlspecialchars($faq['answer']); ?></td>
            <td>
                <a href="?edit=<?php echo $faq['id']; ?>">Upraviť</a> |
                <a href="?delete=<?php echo $faq['id']; ?>" onclick="return confirm('Naozaj chcete vymazať túto otázku?')">Vymazať</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
