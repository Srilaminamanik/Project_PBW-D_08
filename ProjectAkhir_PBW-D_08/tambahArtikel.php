<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'] ?? '';
    $isi = $_POST['isi'] ?? '';
    $created_at = $_POST['created_at'] ?? '';

    if (empty($judul) || empty($isi) || empty($created_at)) {
        $_SESSION['error'] = "Semua field harus diisi!";
        header("Location: dashboardAdmin.php");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO artikel (judul, isi, created_at) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $judul, $isi, $created_at);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Artikel berhasil ditambahkan.";
    } else {
        $_SESSION['error'] = "Gagal menambahkan artikel: " . $conn->error;
    }
    $stmt->close();
    $conn->close();

    header("Location: dashboardAdmin.php");
    exit;
} else {
    header("Location: dashboardAdmin.php");
    exit;
}
