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
    $querySelect = "SELECT * FROM artikel WHERE id = $id";
} elseif ($jenis === 'konsultasi') {
    $querySelect = "SELECT * FROM konsultasi WHERE id = $id";
} else {
    die("Jenis data tidak valid.");
}

$result = $conn->query($querySelect);
if ($result->num_rows == 0) {
    die("Data tidak ditemukan.");
}

$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($jenis === 'artikel') {
        $judul = $conn->real_escape_string($_POST['judul']);
        $isi = $conn->real_escape_string($_POST['isi']);
        $created_at = $_POST['created_at'];

        $queryUpdate = "UPDATE artikel SET judul='$judul', isi='$isi', created_at='$created_at' WHERE id=$id";
    } elseif ($jenis === 'konsultasi') {
        $nama = $conn->real_escape_string($_POST['nama']);
        $email = $conn->real_escape_string($_POST['email']);
        $created_at = $_POST['created_at'];

        $queryUpdate = "UPDATE konsultasi SET nama='$nama', email='$email', created_at='$created_at' WHERE id=$id";
    } else {
        die("Jenis data tidak valid.");
    }

    if ($conn->query($queryUpdate)) {
        header("Location: dashboardAdmin.php");
        exit;
    } else {
        die("Gagal mengupdate data: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Edit <?= htmlspecialchars($jenis) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-6 min-h-screen">
    <main class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Edit <?= htmlspecialchars(ucfirst($jenis)) ?></h1>

        <form method="POST" class="space-y-4">
            <?php if ($jenis === 'artikel'): ?>
                <div>
                    <label class="block mb-1 font-medium" for="judul">Judul</label>
                    <input type="text" id="judul" name="judul" required class="w-full p-2 border rounded" value="<?= htmlspecialchars($data['judul']) ?>" />
                </div>
                <div>
                    <label class="block mb-1 font-medium" for="isi">Isi Artikel</label>
                    <textarea id="isi" name="isi" required rows="6" class="w-full p-2 border rounded"><?= htmlspecialchars($data['isi']) ?></textarea>
                </div>
                <div>
                    <label class="block mb-1 font-medium" for="created_at">Tanggal</label>
                    <input type="datetime-local" id="created_at" name="created_at" required class="w-full p-2 border rounded" value="<?= date('Y-m-d\TH:i', strtotime($data['created_at'])) ?>" />
                </div>
            <?php elseif ($jenis === 'konsultasi'): ?>
                <div>
                    <label class="block mb-1 font-medium" for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required class="w-full p-2 border rounded" value="<?= htmlspecialchars($data['nama']) ?>" />
                </div>
                <div>
                    <label class="block mb-1 font-medium" for="email">Email</label>
                    <input type="email" id="email" name="email" required class="w-full p-2 border rounded" value="<?= htmlspecialchars($data['email']) ?>" />
                </div>
                <div>
                    <label class="block mb-1 font-medium" for="created_at">Tanggal</label>
                    <input type="datetime-local" id="created_at" name="created_at" required class="w-full p-2 border rounded" value="<?= date('Y-m-d\TH:i', strtotime($data['created_at'])) ?>" />
                </div>
            <?php endif; ?>

            <div class="flex justify-between mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
                <a href="delete.php?id=<?= $id ?>&jenis=<?= $jenis ?>" 
                   onclick="return confirm('Yakin ingin menghapus <?= htmlspecialchars($jenis) ?> ini?')" 
                   class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Hapus</a>
            </div>
        </form>

        <div class="mt-6">
            <a href="dashboardAdmin.php" class="text-blue-600 hover:underline">Kembali ke Dashboard</a>
        </div>
    </main>
</body>
</html>
