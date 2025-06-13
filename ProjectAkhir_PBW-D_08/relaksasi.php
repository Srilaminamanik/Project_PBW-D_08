<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Media Relaksasi - MindCare</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 text-gray-800">

<header class="bg-blue-100 shadow sticky top-0 z-50">
  <div class="max-w-4xl mx-auto py-4 px-4 text-center">
    <div class="text-2xl font-bold text-gray-800 mb-2">MindCare</div>

   
    <nav class="flex justify-center space-x-6 text-sm sm:text-base text-gray-800">
      <a href="index.php" class="hover:underline">Home</a>
      <a href="artikel.php" class="hover:underline">Artikel</a>
      <a href="psikolog.php" class="hover:underline">Psikolog</a>
      <a href="konsultasi.php" class="hover:underline font-semibold text-sky-700">Konsultasi</a>
    </nav>
  </div>
</header>

  <main class="max-w-6xl mx-auto px-4 sm:px-6 py-12 sm:py-16">
    <h1 class="text-3xl sm:text-4xl font-bold text-center mb-10 sm:mb-12 text-sky-800">🌿 Media Relaksasi</h1>

    <section class="bg-white p-4 sm:p-6 rounded-xl shadow-md mb-12 border border-gray-200">
      <h2 class="text-xl sm:text-2xl font-semibold text-sky-700 mb-4">Apa Itu Relaksasi?</h2>
      <p class="text-gray-700 mb-4">
        <strong>Relaksasi</strong> adalah proses menenangkan tubuh dan pikiran untuk mengurangi stres, ketegangan, atau kelelahan. Dalam kehidupan yang serba cepat, relaksasi menjadi cara penting untuk menjaga kesehatan mental dan emosional.
      </p>
      <p class="text-gray-700 mb-4">
        Melalui relaksasi, kita memberi waktu bagi diri sendiri untuk berhenti sejenak, bernapas lebih tenang, dan kembali terhubung dengan ketenangan batin.
      </p>
      <h3 class="text-lg sm:text-xl font-semibold text-sky-600 mb-2">Manfaat Relaksasi:</h3>
      <ul class="list-disc list-inside text-gray-700 mb-4">
        <li>Menurunkan stres dan kecemasan</li>
        <li>Meningkatkan kualitas tidur</li>
        <li>Menstabilkan emosi dan suasana hati</li>
        <li>Membantu fokus dan konsentrasi</li>
        <li>Menenangkan pikiran yang overthinking</li>
      </ul>
      <h3 class="text-lg sm:text-xl font-semibold text-sky-600 mb-2">Cara Relaksasi di MindCare:</h3>
      <ul class="list-disc list-inside text-gray-700">
        <li>Dengarkan musik meditasi dari Spotify</li>
        <li>Tonton visualisasi alam yang menenangkan</li>
        <li>Coba afirmasi harian untuk membangun pikiran positif</li>
        <li>Gunakan teknik pernapasan sederhana</li>
      </ul>
    </section>

    <!-- Playlist Musik -->
    <section class="mb-16">
      <h2 class="text-xl sm:text-2xl font-semibold mb-4">🎵 Musik Tenang</h2>
      <p class="mb-6 text-gray-600">Putar musik yang menenangkan untuk membantu mengurangi stres dan kecemasan.</p>
      <div class="w-full aspect-video mb-4 rounded-xl overflow-hidden shadow">
        <iframe style="border:0; width:100%; height:100%" src="https://open.spotify.com/embed/playlist/0Ud29q8X24y87dUAQje04O?utm_source=generator" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
      </div>
    </section>

    <!-- Video Meditasi -->
    <section class="mb-16">
      <h2 class="text-xl sm:text-2xl font-semibold mb-4">🧘 Video Meditasi</h2>
      <p class="mb-6 text-gray-600">Luangkan waktu beberapa menit untuk meditasi singkat dan pernapasan.</p>
      <div class="w-full aspect-video mb-4 rounded-xl overflow-hidden shadow">
        <iframe src="https://www.youtube.com/embed/oqJh0-71q8U?si=vblojW9b4DqIauz8" title="10 Minute Guided Meditation" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="w-full h-full"></iframe>
      </div>
    </section>

    <!-- Gambar Afirmasi -->
    <section>
      <h2 class="text-xl sm:text-2xl font-semibold mb-4">💖 Afirmasi Positif</h2>
      <p class="mb-6 text-gray-600">Gambar dan kutipan untuk membantumu tetap positif dan penuh semangat.</p>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <img src="gambar/afirmasi2.jpeg" alt="Afirmasi Positif 1" class="rounded-lg shadow-md w-full h-auto object-cover">
        <img src="gambar/afirmasi1.png" alt="Afirmasi Positif 2" class="rounded-lg shadow-md w-full h-auto object-cover">
        <img src="gambar/afirmasi3.jpeg" alt="Afirmasi Positif 3" class="rounded-lg shadow-md w-full h-auto object-cover">
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-blue-100 text-gray-700 text-center px-4 py-6 mt-16">
    <div class="max-w-screen-xl mx-auto">
      <p class="text-sm leading-relaxed">
        &copy; <?= date('Y') ?> <strong>MindCare</strong>. Semua hak dilindungi.
      </p>
    </div>
  </footer>

</body>
</html>
