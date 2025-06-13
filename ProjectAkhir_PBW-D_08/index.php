<?php
session_start();
include 'koneksi.php';

$username = $_SESSION['username'] ?? null;
?>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home - MindCare</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen font-sans flex flex-col">

<header>
  <nav class="bg-blue-100 text-gray-700 px-6 py-4 flex justify-between items-center">
    <div class="text-xl font-bold">MindCare</div>
    <ul class="flex space-x-6 items-center">
      <li><a href="index.php" class="hover:underline font-semibold">Home</a></li>
      <li><a href="artikel.php" class="hover:underline">Artikel</a></li>

      <li class="relative">
        <button id="layananToggle" class="hover:underline">Layanan ▼</button>
        <ul id="layananMenu" class="absolute hidden bg-white text-black mt-2 rounded shadow-lg w-40 z-10">
          <li><a href="tes.php" class="block px-4 py-2 hover:bg-gray-100">Tes Mental</a></li>
          <li><a href="konsultasi.php" class="block px-4 py-2 hover:bg-gray-100">Konsultasi</a></li>
          <li><a href="psikolog.php" class="block px-4 py-2 hover:bg-gray-100">Psikolog</a></li>
        </ul>
      </li>

      <li class="relative">
        <button id="akunToggle" class="hover:underline">
          <?= $username ? "Halo, " . htmlspecialchars($username) : "Akun" ?> ▼
        </button>
        <ul id="akunMenu" class="absolute hidden bg-white text-black mt-2 rounded shadow-lg w-32 z-10">
          <?php if ($username): ?>
            <li><a href="logout.php" class="block px-4 py-2 hover:bg-gray-100">Logout</a></li>
          <?php else: ?>
            <li><a href="login.php" class="block px-4 py-2 hover:bg-gray-100">Login</a></li>
            <li><a href="register.php" class="block px-4 py-2 hover:bg-gray-100">Register</a></li>
          <?php endif; ?>
        </ul>
      </li>
    </ul>
  </nav>

  <script>
    const layananToggle = document.getElementById('layananToggle');
    const layananMenu = document.getElementById('layananMenu');
    layananToggle.addEventListener('click', () => {
      layananMenu.classList.toggle('hidden');
    });

    const akunToggle = document.getElementById('akunToggle');
    const akunMenu = document.getElementById('akunMenu');
    akunToggle.addEventListener('click', () => {
      akunMenu.classList.toggle('hidden');
    });

    window.addEventListener('click', function (e) {
      if (!layananToggle.contains(e.target) && !layananMenu.contains(e.target)) {
        layananMenu.classList.add('hidden');
      }
      if (!akunToggle.contains(e.target) && !akunMenu.contains(e.target)) {
        akunMenu.classList.add('hidden');
      }
    });
  </script>
</header>

<main class="flex-grow container mx-auto px-4 sm:px-6 py-6">

  <section class="bg-sky-100 text-sky-800 rounded-lg p-6 sm:p-10 text-center mb-16 shadow-lg">
    <h1 class="text-3xl sm:text-4xl font-bold mb-4">Jaga Kesehatan Mentalmu, Mulai Dari Sini</h1>
    <p class="mb-8 text-lg max-w-3xl mx-auto text-sky-700">
      Temukan artikel, tes mental, konsultasi, Media Relaksasi dan psikolog terpercaya untuk mendukung kesejahteraanmu.
    </p>
    <div class="space-y-3 sm:space-x-4 sm:space-y-0 sm:flex sm:justify-center">
      <a href="tes.php" class="bg-white text-sky-600 px-6 py-3 rounded font-semibold hover:bg-sky-200 transition block">Mulai Tes Mental</a>
      <a href="konsultasi.php" class="bg-white text-sky-600 px-6 py-3 rounded font-semibold hover:bg-sky-200 transition block">Konsultasi Sekarang</a>
      <a href="relaksasi.php" class="bg-white text-sky-600 px-6 py-3 rounded font-semibold hover:bg-sky-200 transition block">Media Relaksasi</a>
    </div>
  </section>

  <section class="bg-white py-12 px-6 md:px-20 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Video Edukasi Kesehatan Mental</h2>
    <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
      Tonton video berikut untuk memahami pentingnya menjaga kesehatan mental, mengenali tanda-tanda stres, dan langkah-langkah awal yang bisa kamu ambil.
    </p>
    <div class="flex justify-center">
      <iframe class="w-full max-w-3xl aspect-video rounded-lg shadow-lg"
        src="https://www.youtube.com/embed/LeFkkFCFbmE"
        title="YouTube video player" frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen></iframe>
    </div>
  </section>

  <section class="bg-gradient-to-b from-blue-100 to-white py-16">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-700 text-center mb-6">Kenapa Kesehatan Mental Itu Penting?</h2>
      <p class="text-center text-gray-700 text-lg mb-10 max-w-3xl mx-auto">
        Menjaga kesehatan mental sama pentingnya dengan menjaga kesehatan fisik...
      </p>
      <div class="grid md:grid-cols-2 gap-10 items-center">
        <div>
          <h3 class="text-2xl font-semibold text-gray-700 mb-4">Ciri-ciri Gangguan Kesehatan Mental:</h3>
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Perubahan suasana hati yang drastis</li>
            <li>Kecemasan berlebihan tanpa alasan jelas</li>
            <li>Kehilangan minat terhadap aktivitas</li>
            <li>Sulit tidur atau terlalu banyak tidur</li>
            <li>Menarik diri dari lingkungan sosial</li>
            <li>Merasa tidak berharga terus-menerus</li>
          </ul>
        </div>
        <div>
          <img src="gambar/penting kesehatan mental.png" alt="Ilustrasi Kesehatan Mental" class="rounded-xl shadow-md w-full max-h-[400px] object-cover">
        </div>
      </div>
      <div class="mt-16 text-center">
        <blockquote class="text-xl italic text-gray-600 max-w-2xl mx-auto border-l-4 border-emerald-500 pl-4">
          "Merawat pikiran adalah langkah pertama untuk mencintai diri sendiri..."
        </blockquote>
      </div>
    </div>
  </section>

  <section class="mb-16 text-center max-w-5xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-8">Layanan Utama Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
        <img src="gambar/tes mental.png" alt="Tes Mental" class="mx-auto mb-4 w-24" />
        <h3 class="font-semibold text-xl mb-2">Tes Mental Online</h3>
        <p>Cek kesehatan mentalmu dengan tes yang mudah dan cepat.</p>
      </div>
      <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
        <img src="gambar/konsultasi.png" alt="Konsultasi" class="mx-auto mb-4 w-24" />
        <h3 class="font-semibold text-xl mb-2">Konsultasi Psikolog</h3>
        <p>Konsultasi privat dengan psikolog berlisensi via chat atau video call.</p>
      </div>
      <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition">
        <img src="gambar/artikel (2).png" alt="Artikel" class="mx-auto mb-4 w-24" />
        <h3 class="font-semibold text-xl mb-2">Artikel Kesehatan Mental</h3>
        <p>Baca artikel bermanfaat untuk memahami dan menjaga kesehatan jiwa.</p>
      </div>
    </div>
  </section>

  <section class="mb-16 max-w-4xl mx-auto text-center px-4">
    <h2 class="text-3xl font-bold mb-8">Apa Kata Pengguna?</h2>
    <div class="space-y-8">
      <blockquote class="bg-white p-6 rounded-lg shadow italic text-gray-700">
        “video edukasi dan serta media Relaksasi sangat membantu saya.”<br/>
        <span class="font-semibold mt-2 block">- Jay Enhypen, 24 tahun</span>
      </blockquote>
      <blockquote class="bg-white p-6 rounded-lg shadow italic text-gray-700">
        “Konsultasi dengan psikolognya sangat membantu.”<br/>
        <span class="font-semibold mt-2 block">- Jungwoon, 23 tahun</span>
      </blockquote>
    </div>
  </section>

  <section class="mb-16 max-w-6xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-6 text-center">Temui Psikolog kami</h2>
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <li class="bg-white p-4 rounded-lg shadow text-center">
        <img src="gambar/jiso.jpeg" alt="kim jiso" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
        <h3 class="text-xl font-semibold">dr. kim jiso, M.Psi</h3>
        <p class="text-sm text-gray-600">Psikolog Anak & Remaja</p>
        <p class="mt-2 text-sm">Kontak: 08123456789</p>
      </li>
      <li class="bg-white p-4 rounded-lg shadow text-center">
        <img src="gambar/Cha Eun-woo.jpeg" alt="Cha Eun-woo" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
        <h3 class="text-xl font-semibold">dr. Cha Eun-woo, Psikolog</h3>
        <p class="text-sm text-gray-600">Psikolog Pernikahan & Trauma</p>
        <p class="mt-2 text-sm">Kontak: 082233445566</p>
      </li>
      <li class="bg-white p-4 rounded-lg shadow text-center">
        <img src="gambar/Choi Hyun Wook.jpeg" alt="Choi Hyun Wook" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
        <h3 class="text-xl font-semibold">dr. Choi Hyun Wook, M.Psi</h3>
        <p class="text-sm text-gray-600">Kesehatan Mental Umum</p>
        <p class="mt-2 text-sm">Kontak: 089998887777</p>
      </li>
      <li class="bg-white p-4 rounded-lg shadow text-center">
        <img src="gambar/songkang.jpeg" alt="Songkang" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
        <h3 class="text-xl font-semibold">dr. Songkang, Psikolog</h3>
        <p class="text-sm text-gray-600">Psikolog Umum</p>
        <p class="mt-2 text-sm">Kontak: 082233445566</p>
      </li>
    </ul>
  </section>

</main>

<footer class="bg-blue-100 text-blue-700 p-4 text-center text-sm mt-10 font-semibold">
  &copy; <?= date('Y') ?> MindCare. Semua hak cipta dilindungi.
</footer>

</body>
</html>
