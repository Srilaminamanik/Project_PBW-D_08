<?php
session_start();
require 'koneksi.php'; 

$successMsg = "";
$errorMsg = "";

$psikologOptions = [];
$result = $conn->query("SELECT nama FROM psikolog ORDER BY nama ASC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $psikologOptions[] = $row['nama'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $psikolog = $_POST['psikolog'] ?? '';
    $pesan = trim($_POST['pesan'] ?? '');

    if (!$nama || !$email || !$psikolog || !$pesan) {
        $errorMsg = "Semua kolom harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Email tidak valid.";
    } elseif (!in_array($psikolog, $psikologOptions)) {
        $errorMsg = "Psikolog tidak valid.";
    } else {
        $stmt = $conn->prepare("INSERT INTO konsultasi (nama, email, psikolog, pesan, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $nama, $email, $psikolog, $pesan);

        if ($stmt->execute()) {
            $successMsg = "Terima kasih, permintaan konsultasi Anda telah kami terima. Kami akan menghubungi Anda segera.";
            $nama = $email = $pesan = $psikolog = "";
        } else {
            $errorMsg = "Gagal menyimpan data ke database: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Konsultasi - MindCare</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen font-sans flex flex-col">

<header class="bg-blue-100 text-gray-700 p-4 w-full">
  <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center">
    <a href="index.php" class="font-bold text-xl mb-2 sm:mb-0">MindCare</a>
    <nav class="flex flex-wrap justify-center">
      <a href="index.php" class="hover:underline px-3 py-1">Home</a>
      <a href="artikel.php" class="hover:underline px-3 py-1">Artikel</a>
      <a href="psikolog.php" class="hover:underline px-3 py-1">Psikolog</a>
      <a href="konsultasi.php" class="hover:underline px-3 py-1 font-semibold">Konsultasi</a>
    </nav>
  </div>
</header>

<main class="flex-grow px-4 py-8 sm:px-6">
  <div class="max-w-xl w-full mx-auto bg-white p-6 sm:p-8 rounded shadow-md">
    <h1 class="text-2xl sm:text-3xl font-bold text-blue-400 mb-6 text-center">Form Permintaan Konsultasi</h1>

    <?php if ($errorMsg): ?>
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4"><?= htmlspecialchars($errorMsg) ?></div>
    <?php endif; ?>
    <?php if ($successMsg): ?>
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4"><?= htmlspecialchars($successMsg) ?></div>
    <?php endif; ?>

    <form method="POST" action="konsultasi.php" class="space-y-6">
      <div>
        <label for="nama" class="block font-semibold mb-1">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($nama ?? '') ?>" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" />
      </div>

      <div>
        <label for="email" class="block font-semibold mb-1">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" />
      </div>

      <div>
        <label for="psikolog" class="block font-semibold mb-1">Pilih Psikolog</label>
        <select id="psikolog" name="psikolog" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
          <option value="" disabled <?= empty($psikolog) ? 'selected' : '' ?>>-- Pilih Psikolog --</option>
          <?php foreach ($psikologOptions as $option): ?>
            <option value="<?= htmlspecialchars($option) ?>" <?= ($psikolog ?? '') === $option ? 'selected' : '' ?>>
              <?= htmlspecialchars($option) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div>
        <label for="pesan" class="block font-semibold mb-1">Pesan / Keluhan</label>
        <textarea id="pesan" name="pesan" rows="4" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"><?= htmlspecialchars($pesan ?? '') ?></textarea>
      </div>

      <div class="text-center">
        <button type="submit"
          class="bg-blue-100 text-gray-700 px-6 py-2 rounded hover:bg-blue-200 transition font-semibold">
          Kirim Permintaan
        </button>
      </div>
    </form>
  </div>
</main>

<footer class="bg-blue-100 text-gray-700 text-center px-4 sm:px-6 py-6 mt-20">
  <div class="max-w-screen-xl mx-auto">
    <p class="text-sm leading-relaxed">
      &copy; <?= date('Y') ?> <strong>MindCare</strong>. Semua hak dilindungi.
    </p>
  </div>
</footer>

</body>
</html>
