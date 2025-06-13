<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard User - MindCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <header class="bg-green-600 text-white p-4 rounded shadow flex justify-between items-center">
        <h1 class="text-2xl font-bold">Dashboard User</h1>
        <a href="logout.php" class="underline hover:text-gray-300">Logout</a>
    </header>

    <main class="mt-6">
        <p>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>!</p>
        <p>Ini adalah halaman dashboard untuk user biasa.</p>
    </main>
</body>
</html>
