<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>MindCare</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 font-sans min-h-screen">

<header class="bg-blue-100 text-gray-700 border-b border-blue-200 py-4">
  <div class="max-w-6xl mx-auto px-4 flex flex-col sm:flex-row justify-between items-center gap-2 sm:gap-0">

    <h1 class="text-2xl font-bold text-gray-800">MindCare</h1>
   
    <nav>
      <ul class="flex flex-wrap justify-center sm:justify-end gap-4 sm:gap-6 text-sm sm:text-base font-medium">
        <li><a href="index.php" class="hover:text-blue-600">Home</a></li>
        <li><a href="artikel.php" class="hover:text-blue-600">Artikel</a></li>
        <li><a href="psikolog.php" class="hover:text-blue-600">Psikolog</a></li>
        <li><a href="konsultasi.php" class="hover:text-blue-600">Konsultasi</a></li>
      </ul>
    </nav>
    
  </div>
</header>

<section class="bg-white py-16 mb-16 border-b border-gray-300">
  <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-10">
    <div class="w-full md:w-1/2 order-2 md:order-1">
      <img src="gambar/foto7.jpg" alt="Tim Psikolog" class="rounded-xl shadow-lg w-full object-cover max-h-[400px]" />
    </div>
    <div class="w-full md:w-1/2 order-1 md:order-2">
      <h2 class="text-3xl font-bold mb-4 text-sky-700">Kamu Nggak Sendirian, MindCare Selalu Ada</h2>
      <p class="text-gray-700 text-lg mb-4">Kami percaya bahwa setiap langkah kecil menuju pemulihan adalah sebuah kemenangan. Tim profesional kami siap menemani prosesmu—dengan hati, empati, dan amanah.</p>
      <p class="text-gray-600">Layanan konsultasi MindCare bisa diakses secara online maupun tatap muka, sesuai kenyamananmu. Rahasia terjaga, kenyamanan diutamakan.</p>
      <a href="konsultasi.php" class="inline-block mt-6 px-6 py-2 rounded-lg bg-yellow-500 text-white shadow hover:bg-yellow-600 transition duration-200">Mulai Konsultasi Sekarang</a>
    </div>
  </div>
</section>

<section class="mb-16 max-w-6xl mx-auto px-4">
  <h2 class="text-3xl font-bold mb-6 text-center text-blue-800">Temui Psikolog kami</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php
    $psikologs = [
      ["gambar/jiso.jpeg", "dr. kim jiso, M.Psi", "Psikolog Anak & Remaja", "08123456789"],
      ["gambar/Cha Eun-woo.jpeg", "dr. Cha Eun-woo, Psikolog", "Psikolog Pernikahan & Trauma", "082233445566"],
      ["gambar/Choi Hyun Wook.jpeg", "dr. Choi Hyun Wook, M.Psi", "Kesehatan Mental Umum", "089998887777"],
      ["gambar/songkang.jpeg", "dr. Songkang, Psikolog", "Psikolog Umum", "082233445566"]
    ];
    foreach ($psikologs as $p) {
      echo '
      <div onclick="selectCard(this)" class="psikolog-card p-4 rounded-lg shadow text-center bg-white hover:scale-105 transition-all duration-300 cursor-pointer">
        <img src="'.$p[0].'" alt="'.$p[1].'" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
        <h3 class="text-xl font-semibold text-blue-800">'.$p[1].'</h3>
        <p class="text-sm text-blue-600">'.$p[2].'</p>
        <p class="mt-2 text-sm text-blue-600">Kontak: '.$p[3].'</p>
      </div>';
    }
    ?>
  </div>
</section>

<section class="bg-blue-100 py-16 border-t border-blue-200">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-blue-900 mb-4">Kenapa Memilih MindCare?</h2>
    <p class="text-blue-700 max-w-2xl mx-auto mb-8">Kami menghadirkan layanan kesehatan mental yang terpercaya, aman, dan ramah.</p>
    <div class="flex flex-col md:flex-row justify-center gap-8 text-left">
      <div class="bg-white p-6 rounded-xl shadow w-full md:w-1/3">
        <h3 class="font-semibold text-blue-800 text-xl mb-2">Psikolog Terverifikasi</h3>
        <p class="text-blue-700 text-sm">Psikolog berpengalaman di bidangnya.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow w-full md:w-1/3">
        <h3 class="font-semibold text-blue-800 text-xl mb-2">Kerahasiaan Terjamin</h3>
        <p class="text-blue-700 text-sm">Menjunjung tinggi kode etik profesi.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow w-full md:w-1/3">
        <h3 class="font-semibold text-blue-800 text-xl mb-2">Layanan Online & Offline</h3>
        <p class="text-blue-700 text-sm">Pendekatan fleksibel dan manusiawi.</p>
      </div>
    </div>
  </div>
</section>

<footer class="text-center p-4 mt-10 bg-blue-100 text-gray-700">
  &copy; <?= date('Y') ?> MindCare. All rights reserved.
</footer>

<script>
  function selectCard(card) {
    document.querySelectorAll('.psikolog-card').forEach(c => {
      c.classList.remove('ring-2', 'ring-yellow-400', 'shadow-xl', 'z-10', 'scale-105');
    });
    card.classList.add('ring-2', 'ring-yellow-400', 'shadow-xl', 'z-10', 'scale-105');
  }

  document.getElementById("menuToggle").addEventListener("click", function () {
    document.getElementById("mobileMenu").classList.toggle("hidden");
  });
</script>

</body>
</html>
