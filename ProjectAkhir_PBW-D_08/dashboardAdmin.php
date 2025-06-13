<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$queryArtikel = "SELECT id, judul, created_at FROM artikel ORDER BY created_at DESC";
$resultArtikel = $conn->query($queryArtikel);

$queryKonsultasi = "SELECT id, nama, email, created_at FROM konsultasi ORDER BY created_at DESC";
$resultKonsultasi = $conn->query($queryKonsultasi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin - MindCare</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">

  <header class="bg-blue-100 text-grey-700 px-4 sm:px-6 py-4 flex flex-col sm:flex-row justify-between items-center w-full">
    <h1 class="text-xl font-bold mb-2 sm:mb-0">Dashboard Admin</h1>
    <a href="logout.php" class="underline hover:text-gray-300">Logout</a>
  </header>

  <main class="max-w-6xl mx-auto px-4 sm:px-6 py-6 space-y-10">
    <section>
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
        <h2 class="text-2xl font-semibold">Daftar Artikel</h2>
        <button id="btnTambahArtikel" class="bg-blue-100 text-grey-700 px-4 py-2 rounded hover:bg-green-700">Tambah Artikel</button>
      </div>

      <?php if ($resultArtikel->num_rows > 0): ?>
        <div class="overflow-auto">
          <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
              <tr class="bg-gray-200">
                <th class="border border-gray-300 p-2 text-left">No</th>
                <th class="border border-gray-300 p-2 text-left">Judul</th>
                <th class="border border-gray-300 p-2 text-left">Tanggal Dibuat</th>
                <th class="border border-gray-300 p-2 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php while ($artikel = $resultArtikel->fetch_assoc()): ?>
                <tr>
                  <td class="border border-gray-300 p-2"><?= $no++ ?></td>
                  <td class="border border-gray-300 p-2"><?= htmlspecialchars($artikel['judul']) ?></td>
                  <td class="border border-gray-300 p-2"><?= date('d M Y, H:i', strtotime($artikel['created_at'])) ?></td>
                  <td class="border border-gray-300 p-2 text-center space-x-2">
                    <a href="edit.php?id=<?= $artikel['id'] ?>&jenis=artikel" class="text-blue-600 hover:underline">Edit</a>
                    <span>|</span>
                    <a href="delete.php?id=<?= $artikel['id'] ?>&jenis=artikel" onclick="return confirm('Yakin ingin menghapus artikel ini?')" class="text-red-600 hover:underline">Hapus</a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-gray-600 mt-4">Belum ada artikel yang diupload.</p>
      <?php endif; ?>
    </section>

    <section>
      <h2 class="text-2xl font-semibold mb-4">Daftar Konsultasi</h2>
      <?php if ($resultKonsultasi->num_rows > 0): ?>
        <div class="overflow-auto">
          <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
              <tr class="bg-gray-200">
                <th class="border border-gray-300 p-2 text-left">No</th>
                <th class="border border-gray-300 p-2 text-left">Nama</th>
                <th class="border border-gray-300 p-2 text-left">Email</th>
                <th class="border border-gray-300 p-2 text-left">Tanggal</th>
                <th class="border border-gray-300 p-2 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php while ($konsul = $resultKonsultasi->fetch_assoc()): ?>
                <tr>
                  <td class="border border-gray-300 p-2"><?= $no++ ?></td>
                  <td class="border border-gray-300 p-2"><?= htmlspecialchars($konsul['nama']) ?></td>
                  <td class="border border-gray-300 p-2"><?= htmlspecialchars($konsul['email']) ?></td>
                  <td class="border border-gray-300 p-2"><?= date('d M Y, H:i', strtotime($konsul['created_at'])) ?></td>
                  <td class="border border-gray-300 p-2 text-center space-x-2">
                    <a href="edit.php?id=<?= $konsul['id'] ?>&jenis=konsultasi" class="text-blue-600 hover:underline">Edit</a>
                    <span>|</span>
                    <a href="delete.php?id=<?= $konsul['id'] ?>&jenis=konsultasi" onclick="return confirm('Yakin ingin menghapus konsultasi ini?')" class="text-red-600 hover:underline">Hapus</a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-gray-600 mt-4">Belum ada data konsultasi.</p>
      <?php endif; ?>
    </section>
  </main>

  <div id="modalTambahArtikel" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white rounded p-6 w-full max-w-md mx-4 shadow-lg relative">
      <h3 class="text-xl font-semibold mb-4">Tambah Artikel Baru</h3>
      <form action="tambahArtikel.php" method="POST" class="space-y-4">
        <div>
          <label for="judul" class="block mb-1 font-medium">Judul</label>
          <input type="text" id="judul" name="judul" required class="w-full p-2 border rounded" />
        </div>
        <div>
          <label for="isi" class="block mb-1 font-medium">Isi Artikel</label>
          <textarea id="isi" name="isi" rows="5" required class="w-full p-2 border rounded"></textarea>
        </div>
        <div>
          <label for="created_at" class="block mb-1 font-medium">Tanggal</label>
          <input type="datetime-local" id="created_at" name="created_at" required class="w-full p-2 border rounded" />
        </div>
        <div class="flex justify-end space-x-4 mt-6">
          <button type="button" id="btnCloseModal" class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100">Batal</button>
          <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    const btnTambahArtikel = document.getElementById('btnTambahArtikel');
    const modalTambahArtikel = document.getElementById('modalTambahArtikel');
    const btnCloseModal = document.getElementById('btnCloseModal');

    btnTambahArtikel.addEventListener('click', () => {
      modalTambahArtikel.classList.remove('hidden');
      modalTambahArtikel.classList.add('flex');
    });

    btnCloseModal.addEventListener('click', () => {
      modalTambahArtikel.classList.add('hidden');
      modalTambahArtikel.classList.remove('flex');
    });
  </script>
</body>
</html>
