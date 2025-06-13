<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tes Kesehatan Mental - MindCare</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

<header>
  <nav class="bg-blue-100 text-gray-700 px-6 py-4 flex justify-between items-center shadow-md">
    <div class="text-xl font-bold">MindCare</div>
    <ul class="flex space-x-6 items-center">
      <li><a href="index.php" class="hover:underline">Kembali ke Home</a></li>
    </ul>
  </nav>
</header>

<main class="container mx-auto px-4 py-10 flex-grow">
  <h2 class="text-3xl font-semibold text-center text-gray-800 mb-10">Tes Kesehatan Mental</h2>

  <form id="tesForm" class="bg-white max-w-3xl mx-auto p-8 rounded-xl shadow-lg flex flex-col gap-8">
    <div>
      <label for="q1" class="block font-semibold mb-2 text-gray-700">1. Apakah Anda merasa cemas akhir-akhir ini?</label>
      <select id="q1" name="q1" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <div>
      <label for="q2" class="block font-semibold mb-2 text-gray-700">2. Apakah Anda sulit tidur atau lelah terus-menerus?</label>
      <select id="q2" name="q2" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <div>
      <label for="q3" class="block font-semibold mb-2 text-gray-700">3. Apakah Anda kehilangan minat pada hal yang biasa disukai?</label>
      <select id="q3" name="q3" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <div>
      <label for="q4" class="block font-semibold mb-2 text-gray-700">4. Apakah Anda merasa sedih atau kosong secara emosional?</label>
      <select id="q4" name="q4" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <div>
      <label for="q5" class="block font-semibold mb-2 text-gray-700">5. Apakah Anda mudah marah atau tersinggung?</label>
      <select id="q5" name="q5" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <div>
      <label for="q6" class="block font-semibold mb-2 text-gray-700">6. Apakah Anda merasa tidak berharga atau bersalah berlebihan?</label>
      <select id="q6" name="q6" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <div>
      <label for="q7" class="block font-semibold mb-2 text-gray-700">7. Apakah Anda merasa kesulitan untuk fokus atau berkonsentrasi?</label>
      <select id="q7" name="q7" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <div>
      <label for="q8" class="block font-semibold mb-2 text-gray-700">8. Apakah Anda merasa cemas saat bersosialisasi?</label>
      <select id="q8" name="q8" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <div>
      <label for="q9" class="block font-semibold mb-2 text-gray-700">9. Apakah Anda merasa putus asa terhadap masa depan?</label>
      <select id="q9" name="q9" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <div>
      <label for="q10" class="block font-semibold mb-2 text-gray-700">10. Apakah Anda pernah merasa ingin menyerah atau mengakhiri hidup?</label>
      <select id="q10" name="q10" required class="form-select border border-gray-300 rounded-md px-3 py-2 w-full">
        <option value="">Pilih jawaban</option>
        <option value="0">Tidak Pernah</option>
        <option value="1">Kadang-kadang</option>
        <option value="2">Sering</option>
        <option value="3">Selalu</option>
      </select>
    </div>

    <button type="submit" class="bg-blue-300 hover:bg-blue-300 text-white font-bold py-2 px-4 rounded">Submit</button>
  </form>

  <div id="hasil" class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md text-center text-xl font-semibold text-blue-800 hidden"></div>
</main>

<footer class="bg-blue-200 text-grey p-4 text-center text-sm mt-auto">
  &copy; <?= date("Y") ?> MindCare. All rights reserved.
</footer>

<script>
  document.getElementById('tesForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let total = 0;
    for (let i = 1; i <= 10; i++) {
      const value = parseInt(document.getElementById('q' + i).value);
      if (!isNaN(value)) {
        total += value;
      }
    }

    let hasil = '';
    if (total <= 7) {
      hasil = 'Anda dalam kondisi sehat secara mental.';
    } else if (total <= 15) {
      hasil = 'Anda mungkin mengalami stres ringan. Cobalah untuk istirahat dan berbicara dengan orang terpercaya.';
    } else if (total <= 22) {
      hasil = 'Anda tampaknya mengalami gejala stres atau depresi sedang. Pertimbangkan untuk konsultasi dengan ahli.';
    } else {
      hasil = 'Gejala Anda menunjukkan kemungkinan gangguan mental serius. Harap segera konsultasi ke profesional kesehatan jiwa.';
    }

    const hasilDiv = document.getElementById('hasil');
    hasilDiv.textContent = hasil;
    hasilDiv.classList.remove('hidden');
  });
</script>

</body>
</html>
