<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_users.php");
    exit;
}

$result = $conn->query("SELECT id, username, role FROM users ORDER BY id");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Users - MindCare</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="css/style.css" />
</head>
<body class="bg-gray-100 min-h-screen">

<header class="bg-blue-700 text-white p-4 flex justify-between items-center">
  <h1 class="text-xl font-bold">Admin Panel - Users</h1>
  <a href="index.php" class="underline">Ke Beranda</a>
</header>

<main class="container mx-auto p-6">
  <h2 class="text-2xl mb-4">Kelola User</h2>
  <table class="w-full bg-white border-collapse border border-gray-300">
    <thead>
      <tr class="bg-gray-200">
        <th class="border border-gray-300 p-2">ID</th>
        <th class="border border-gray-300 p-2">Username</th>
        <th class="border border-gray-300 p-2">Role</th>
        <th class="border border-gray-300 p-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td class="border border-gray-300 p-2"><?= $row['id'] ?></td>
          <td class="border border-gray-300 p-2"><?= htmlspecialchars($row['username']) ?></td>
          <td class="border border-gray-300 p-2"><?= $row['role'] ?></td>
          <td class="border border-gray-300 p-2">
            <a href="admin_users.php?delete=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus user ini?')" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>

</body>
</html>
