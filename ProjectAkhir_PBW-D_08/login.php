<?php
session_start();
include 'koneksi.php';

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: dashboardAdmin.php');
    } else {
        header('Location: index.php');
    }
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true); 

            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header('Location: dashboardAdmin.php');
                exit;
            } elseif ($user['role'] === 'user') {
                header('Location: index.php');
                exit;
            } else {
                $error = "Role pengguna tidak valid.";
            }
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "User tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - MindCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-3xl font-bold mb-6 text-center text-grey-700">Login Akun</h2>

        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="space-y-6">
            <div>
                <label for="username" class="block mb-2 font-semibold text-gray-700">Username</label>
                <input type="text" id="username" name="username" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label for="password" class="block mb-2 font-semibold text-gray-700">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <button type="submit"
                class="w-full bg-green-300 text-white font-semibold py-2 rounded hover:bg-green-700 transition-colors duration-200">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-gray-600">
            Belum punya akun? <a href="register.php" class="text-green-800 hover:underline">Daftar di sini</a>
        </p>
    </div>
</body>
</html>
