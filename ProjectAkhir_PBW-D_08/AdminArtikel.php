<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $stmt = $conn->prepare("INSERT INTO artikel (judul, isi, tanggal) VALUES (?, ?, NOW())");
    $stmt->bind_param("ss", $judul, $isi);
    $stmt->execute();
    header("Location: admin_artikel.php");
    exit;
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $stmt = $conn->prepare("UPDATE artikel SET judul=?, isi=? WHERE id=?");
    $stmt->bind_param("ssi", $judul, $isi, $id);
    $stmt->execute();
    header("Location: admin_artikel.php");
    exit;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM artikel WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: admin_artikel.php");
    exit;
}

$result = $conn->query("SELECT * FROM artikel ORDER BY tanggal DESC");
if (!$result) {
    die("Query error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Admin Artikel</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
  .hidden { display: none; }
</style>
</head>
<body class="bg-gray-100 min-h-screen">

<header class="bg-blue-700 text-white p-4 flex justify-between items-center">
  <h1 class="text-xl font-bold">Admin Panel - Artikel</h1>
  <a href="index.php" class="underline">Ke Beranda</a>
</header>

<main class="container mx-auto p-6">
  <h2 class="text-2xl mb-4">Kelola Artikel</h2>

  <section class="mb-6 bg-white p-4 rounded shadow">
    <h3 class="font-semibold mb-2">Tambah Artikel Baru</h3>
    <form method="POST" class="space-y-2">
      <input type="text" name="judul" placeholder="Judul" required class="w-full p-2 border rounded" />
      <textarea name="isi" placeholder="Isi artikel" required class="w-full p-2 border rounded" rows="5"></textarea>
      <button type="submit" name="tambah" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Tambah</button>
    </form>
  </section>

  <section>
    <h3 class="font-semibold mb-2">Daftar Artikel</h3>
    <table class="w-full bg-white border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-200">
          <th class="border border-gray-300 p-2">ID</th>
          <th class="border border-gray-300 p-2">Judul</th>
          <th class="border border-gray-300 p-2">Tanggal</th>
          <th class="border border-gray-300 p-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td class="border border-gray-300 p-2"><?= $row['id'] ?></td>
            <td class="border border-gray-300 p-2"><?= htmlspecialchars($row['judul']) ?></td>
            <td class="border border-gray-300 p-2"><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
            <td class="border border-gray-300 p-2 space-x-2">
              <button onclick="editArtikel(<?= $row['id'] ?>, '<?= addslashes(htmlspecialchars($row['judul'])) ?>', '<?= addslashes(htmlspecialchars($row['isi'])) ?>')" class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500">Edit</button>
              <a href="admin_artikel.php?delete=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus artikel?')" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>

  <section id="edit-section" class="mt-6 bg-white p-4 rounded shadow hidden">
    <h3 class="font-semibold mb-2">Edit Artikel</h3>
    <form method="POST" class="space-y-2">
      <input type="hidden" name="id" id="edit-id" />
      <input type="text" name="judul" id="edit-judul" placeholder="Judul" required class="w-full p-2 border rounded" />
      <textarea name="isi" id="edit-isi" placeholder="Isi artikel" required class="w-full p-2 border rounded" rows="5"></textarea>
      <button type="submit" name="edit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
      <button type="button" onclick="cancelEdit()" class="bg-gray-400 px-4 py-2 rounded hover:bg-gray-500">Batal</button>
    </form>
  </section>
</main>

<script>
function editArtikel(id, judul, isi) {
  document.getElementById('edit-section').classList.remove('hidden');
  document.getElementById('edit-id').value = id;
  document.getElementById('edit-judul').value = judul;
  document.getElementById('edit-isi').value = isi;
  window.scrollTo(0, document.body.scrollHeight);
}

function cancelEdit() {
  document.getElementById('edit-section').classList.add('hidden');
}
</script>

</body>
</html>
