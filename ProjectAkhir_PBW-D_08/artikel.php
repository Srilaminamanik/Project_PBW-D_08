<?php
include 'koneksi.php';
$result = $conn->query("SELECT id, judul, isi, created_at FROM artikel ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Daftar Artikel - MindCare</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-white min-h-screen scroll-smooth">

  <header class="fixed top-0 left-0 right-0 z-50 bg-blue-100 bg-opacity-90 backdrop-blur text-gray-700 shadow py-3 px-4 sm:px-8">
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row sm:justify-between items-center gap-2 sm:gap-0">
      <a href="index.php" class="font-bold text-xl text-center sm:text-left">MindCare</a>
      <nav class="flex flex-wrap justify-center sm:justify-start gap-4 text-sm sm:text-base font-medium">
        <a href="index.php" class="hover:underline">Home</a>
        <a href="artikel.php" class="hover:underline font-semibold">Artikel</a>
        <a href="psikolog.php" class="hover:underline">Psikolog</a>
        <a href="konsultasi.php" class="hover:underline">Konsultasi</a>
      </nav>
    </div>
  </header>

  <main class="max-w-6xl mx-auto pt-[100px] px-4 sm:px-6 lg:px-8">

    <section class="bg-white py-16 mb-16 border-b border-gray-300 rounded-xl shadow-sm">
  <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-8 lg:gap-12 px-6">
    
    <div class="w-full md:basis-1/2 md:flex-grow">
      <h2 class="text-2xl sm:text-3xl font-bold mb-4 text-sky-700">Eksplorasi Artikel Kesehatan Mental</h2>
      <p class="text-gray-700 text-base mb-3">
        Temukan berbagai tulisan informatif, inspiratif, dan edukatif seputar kesehatan mental.
      </p>
      <p class="text-gray-600 text-sm">
        Kami percaya bahwa edukasi adalah langkah awal menuju kesadaran dan pemulihan.
      </p>
      <a href="#daftar-artikel" class="inline-block mt-5 px-5 py-2 rounded-lg bg-sky-600 text-white text-sm shadow hover:bg-sky-700 transition">
        Jelajahi Artikel
      </a>
    </div>

    <div class="w-full md:basis-1/2 md:flex-grow">
      <img src="gambar/kesehatan mental.jpeg" alt="Ilustrasi Artikel" class="rounded-xl shadow-lg w-full h-auto max-h-[320px] object-cover" />
    </div>

  </div>
</section>

    <section id="daftar-artikel" class="mb-16">
      <h1 class="text-3xl sm:text-4xl font-extrabold mb-10 text-blue-900 text-center">Daftar Artikel</h1>

      <?php if ($result && $result->num_rows > 0): ?>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          <?php while ($row = $result->fetch_assoc()): ?>
            <article class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 p-6 flex flex-col">
              <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2"><?= htmlspecialchars($row['judul']) ?></h2>
              <time class="text-sm text-gray-500 mb-3"><?= date('d M Y', strtotime($row['created_at'])) ?></time>
              <p class="text-gray-700 flex-grow mb-4 text-sm">
                <?= htmlspecialchars(strlen($row['isi']) > 150 ? substr($row['isi'], 0, 150) . "..." : $row['isi']) ?>
              </p>
              <a href="artikel_detail.php?id=<?= $row['id'] ?>" class="mt-auto text-blue-600 font-semibold hover:text-blue-800 text-sm">
                Selengkapnya →
              </a>
            </article>
          <?php endwhile; ?>
        </div>
      <?php else: ?>
        <p class="text-center text-gray-500 text-lg">Belum ada artikel tersedia.</p>
      <?php endif; ?>
    </section>

  </main>

<footer class="bg-blue-100 text-blue-700 p-4 text-center text-sm mt-10 font-semibold">
  &copy; <?= date('Y') ?> MindCare. Semua hak cipta dilindungi.
</footer>

</body>
</html>
