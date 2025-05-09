<?php
session_start();
require_once '../classes/Employee.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$employee = new Employee();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_employee'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $youtube = $_POST['youtube'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $employee->updateEmployee($id, $name, $position, $description, $image, $facebook, $twitter, $instagram, $youtube);
    } else {
        $employee->createEmployee($name, $position, $description, $image, $facebook, $twitter, $instagram, $youtube);
    }

    header('Location: admin_dashboard.php');
    exit;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $employee->deleteEmployee($id);
    header('Location: admin_dashboard.php');
    exit;
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $employeeData = $employee->getEmployeeById($id)->fetch(PDO::FETCH_ASSOC);
}

$employees = $employee->getAllEmployees();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrácia - Správa Zamestnancov</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
</head>
<body>
<h2>Správa Zamestnancov</h2>
<a href="logout.php">Odhlásiť sa</a>
<a href="FAQs/admin_faqs.php">Správa FAQ</a>

<h3><?php echo isset($employeeData) ? 'Upraviť zamestnanca' : 'Pridať nového zamestnanca'; ?></h3>

<form method="POST">
    <?php if (isset($employeeData)): ?>
        <input type="hidden" name="id" value="<?php echo $employeeData['id']; ?>">
    <?php endif; ?>

    <input type="text" name="name" placeholder="Meno" value="<?php echo $employeeData['name'] ?? ''; ?>" required><br>
    <input type="text" name="position" placeholder="Pozícia" value="<?php echo $employeeData['position'] ?? ''; ?>" required><br>
    <textarea name="description" placeholder="Popis" required><?php echo $employeeData['description'] ?? ''; ?></textarea><br>
    <input type="text" name="image" placeholder="Obrázok" value="<?php echo $employeeData['image'] ?? ''; ?>" required><br>
    <input type="text" name="facebook" placeholder="Facebook link" value="<?php echo $employeeData['facebook_link'] ?? ''; ?>" required><br>
    <input type="text" name="twitter" placeholder="Twitter link" value="<?php echo $employeeData['twitter_link'] ?? ''; ?>" required><br>
    <input type="text" name="instagram" placeholder="Instagram link" value="<?php echo $employeeData['instagram_link'] ?? ''; ?>" required><br>
    <input type="text" name="youtube" placeholder="YouTube link" value="<?php echo $employeeData['youtube_link'] ?? ''; ?>" required><br>
    <button type="submit" name="add_employee"><?php echo isset($employeeData) ? 'Upraviť zamestnanca' : 'Pridať zamestnanca'; ?></button>
</form>

<h3>Zoznam zamestnancov</h3>
<table border="1">
    <tr>
        <th>Meno</th>
        <th>Pozícia</th>
        <th>Akcie</th>
    </tr>
    <?php while ($row = $employees->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['position']); ?></td>
            <td>
                <a href="admin_dashboard.php?edit=<?php echo $row['id']; ?>">Upraviť</a> |
                <a href="admin_dashboard.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Naozaj vymazať?')">Vymazať</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
