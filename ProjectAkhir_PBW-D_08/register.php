<?php
session_start();
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $role = $_POST['role'];  

    if ($role === 'admin') {
        $admin_code = $_POST['admin_code'] ?? '';
        if ($admin_code !== 'RAHASIA123') {
            $error = "Kode rahasia admin salah!";
        }
    }

    if (!isset($error)) {
        if ($password !== $confirm) {
            $error = "Password dan konfirmasi tidak cocok!";
        } else {
      
            $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $error = "Username sudah dipakai!";
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt2 = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
                $stmt2->bind_param("sss", $username, $hash, $role);
                $stmt2->execute();
                header("Location: login.php");
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Register - MindCare</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
<div class="bg-white p-6 rounded shadow w-full max-w-md">
  <h2 class="text-2xl font-bold mb-6 text-center">Register Akun Baru</h2>

  <?php if (isset($error)): ?>
    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" class="space-y-4">
    <input type="text" name="username" placeholder="Username" required class="w-full p-2 border rounded" />
    <input type="password" name="password" placeholder="Password" required class="w-full p-2 border rounded" />
    <input type="password" name="confirm" placeholder="Konfirmasi Password" required class="w-full p-2 border rounded" />

    <label class="block font-semibold">Daftar sebagai:</label>
    <select name="role" required class="w-full p-2 border rounded">
      <option value="user" selected>User</option>
      <option value="admin">Admin</option>
    </select>

    <div id="admin_code_container" class="hidden">
      <input type="text" name="admin_code" placeholder="Masukkan kode rahasia admin" class="w-full p-2 border rounded mt-2" />
    </div>

    <button type="submit" name="submit" class="w-full bg-green-300 text-white p-2 rounded hover:bg-green-700">Register</button>
  </form>
  <p class="mt-4 text-center text-gray-600">
    Sudah punya akun? <a href="login.php" class="text-green-800 hover:underline">Login</a>
  </p>
</div>

<script>
  const roleSelect = document.querySelector('select[name="role"]');
  const adminCodeContainer = document.getElementById('admin_code_container');

  roleSelect.addEventListener('change', () => {
    if (roleSelect.value === 'admin') {
      adminCodeContainer.classList.remove('hidden');
    } else {
      adminCodeContainer.classList.add('hidden');
    }
  });
</script>
</body>
</html>
