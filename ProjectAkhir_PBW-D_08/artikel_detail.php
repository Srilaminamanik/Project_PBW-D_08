<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("<p class='text-red-600 text-center mt-10'>ID artikel tidak ditemukan.</p>");
}

$stmt = $conn->prepare("SELECT judul, isi, created_at FROM artikel WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("<p class='text-red-600 text-center mt-10'>Artikel tidak ditemukan.</p>");
}

$data = $result->fetch_assoc();

$gambar = '';
switch ($id) {
    case 1:
        $gambar = 'gambar/foto3.png';
        break;
    case 2:
        $gambar = 'gambar/foto2.jpg';
        break;
    case 3:
        $gambar = 'gambar/foto1.jpg';
        break;
    case 4:
        $gambar = 'gambar/foto6.jpeg';
        break;
    case 5:
        $gambar = 'gambar/foto5.jpg';
        break;
    case 6:
        $gambar = 'gambar/foto4.jpg';
        break;
    default:
        $gambar = 'uploads/default.jpg'; 
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($data['judul']) ?> - MindCare</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <header class="bg-blue-100 text-gray-700 w-full fixed top-0 left-0 z-50 shadow">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center px-4 sm:px-6 py-3">
      <a href="index.php" class="font-bold text-xl">MindCare</a>
      <nav class="hidden sm:flex space-x-4">
        <a href="index.php" class="hover:underline">Home</a>
        <a href="artikel.php" class="hover:underline">Artikel</a>
        <a href="psikolog.php" class="hover:underline">Psikolog</a>
        <a href="konsultasi.php" class="hover:underline font-semibold">Konsultasi</a>
      </nav>
    </div>
  </header>

  <main class="pt-24 px-4 sm:px-6">
    <div class="max-w-screen-md mx-auto bg-white p-6 sm:p-8 rounded-xl shadow">
      <img src="<?= htmlspecialchars($gambar) ?>" alt="Gambar Artikel" class="rounded-lg w-full mb-6">

      <h1 class="text-2xl sm:text-3xl font-bold text-blue-800 mb-4"><?= htmlspecialchars($data['judul']) ?></h1>
      <p class="text-gray-500 text-sm mb-4"><?= date('d M Y', strtotime($data['created_at'])) ?></p>

      <div class="text-gray-700 leading-relaxed whitespace-pre-line text-base">
        <?= nl2br(htmlspecialchars($data['isi'])) ?>
      </div>

      <a href="artikel.php" class="inline-block mt-6 text-blue-600 hover:underline">← Kembali ke daftar artikel</a>
    </div>
  </main>

  <footer class="bg-blue-100 text-gray-600 text-center text-sm py-6 mt-16">
    <p>&copy; <?= date('Y') ?> MindCare. Semua hak dilindungi.</p>
  </footer>

</body>
</html>
