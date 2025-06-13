<header>
  <nav class="container mx-auto flex justify-between items-center p-4">
    <a href="/index.php" class="text-xl font-bold">MentalHealth</a>
    <ul class="flex space-x-4">
      <li><a href="/index.php" class="hover:underline">Home</a></li>
      <li><a href="/artikel/list.php" class="hover:underline">Artikel</a></li>
      <li><a href="/psikolog.php" class="hover:underline">Psikolog</a></li>
      <li><a href="/tes.php" class="hover:underline">Tes</a></li>
      <li><a href="/konsultasi.php" class="hover:underline">Konsultasi</a></li>
      <?php if(isset($_SESSION['user'])): ?>
        <?php if($_SESSION['role'] == 'admin'): ?>
          <li><a href="/artikel/list.php" class="hover:underline">Admin Panel</a></li>
        <?php endif; ?>
        <li><a href="/logout.php" class="hover:underline">Logout (<?=htmlspecialchars($_SESSION['user'])?>)</a></li>
      <?php else: ?>
        <li><a href="/login.php" class="hover:underline">Login</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>
