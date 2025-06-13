<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id']) || !isset($_GET['jenis'])) {
    die("Data tidak lengkap.");
}

$id = intval($_GET['id']);
$jenis = $_GET['jenis'];

if ($jenis === 'artikel') {
    $queryDelete = "DELETE FROM artikel WHERE id = $id";
} elseif ($jenis === 'konsultasi') {
    $queryDelete = "DELETE FROM konsultasi WHERE id = $id";
} else {
    die("Jenis data tidak valid.");
}

if ($conn->query($queryDelete)) {
    header("Location: dashboardAdmin.php");
    exit;
} else {
    die("Gagal menghapus data: " . $conn->error);
}
?>
