<?php
session_start();
require_once 'connect.php';

if(!isset($_SESSION['kulad']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}

if(isset($_GET['logout'])){
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Admin Panel - MSB Library</title>
<link rel="stylesheet" href="css/genel.css">
</head>
<body class="body">
<div id="container">
<header id="header">
  <div id="logo"><a href="index.html"><img src="images/logo.png" alt="MSB Logo"></a></div>
  <nav id="main-nav">
    <ul>
      <li>Hoşgeldiniz, <?php echo $_SESSION['kulad']; ?></li>
      <li><a href="logout.php" class="btn secondary">Çıkış</a></li>
    </ul>
  </nav>
</header>

<main id="content">
<h2>Admin Dashboard</h2>

<section class="admin-grid">
    <!-- Üye Yönetimi -->
    <div class="admin-card">
      <h3>Üye Yönetimi</h3>
      <p>Üyeleri ekle, sil veya güncelle.</p>
      <a href="uyeler.php" class="btn">Üye Listesi</a>
      <a href="uyeekle.php" class="btn">Yeni Üye Ekle</a>
    </div>

    <!-- Kitap Yönetimi -->
    <div class="admin-card">
      <h3>Kitap Yönetimi</h3>
      <p>Kitap ekle, güncelle veya sil.</p>
      <a href="kitaplar.php" class="btn">Kitap Listesi</a>
      <a href="kitapekle.php" class="btn">Yeni Kitap Ekle</a>
    </div>

    <!-- Sistem Ayarları -->
    <div class="admin-card">
      <h3>Ayarlar</h3>
      <p>Sistem ayarlarını düzenle.</p>
      <a href="ayarlar.php" class="btn">Ayarlar</a>
    </div>
</section>

<section class="admin-log">
    <h3>Son İşlemler</h3>
    <ul>
      <li>Ali — 12 Eki 2025 — Kitap ödünç aldı</li>
      <li>Ayşe — 11 Eki 2025 — Üye güncelleme</li>
      <li>Mehmet — 10 Eki 2025 — Kitap eklendi</li>
    </ul>
</section>

</main>
<footer id="footer">
  <p>© <span id="year7"></span> MSB Library</p>
</footer>
</div>

<script>document.getElementById('year7').textContent = new Date().getFullYear();</script>
</body>
</html>
