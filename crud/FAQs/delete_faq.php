<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

require_once '../../classes/FAQ.php';
$faq = new FAQ();

if (isset($_GET['id'])) {
    $faq->deleteFaq($_GET['id']);
}

header('Location: index.php');
exit;
