<?php
session_start();
require_once 'connect.php';

if(!isset($_SESSION['kulad']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}

$hata = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $kulad = $conn->real_escape_string($_POST['kulad']);
    $sifre = hash('sha256', $_POST['sifre']);
    $rol = $_POST['rol'] === 'admin' ? 'admin' : 'uye';
    $durum = 'aktif';

    $sql = "INSERT INTO kullanicilar (kulad, sifre, rol, durum) VALUES ('$kulad','$sifre','$rol','$durum')";
    if($conn->query($sql)){
        header("Location: uyeler.php");
        exit();
    } else {
        $hata = "Üye eklenirken hata oluştu.";
    }
}
?>

<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Üye Ekle - Admin</title>
<link rel="stylesheet" href="css/genel.css">
</head>
<body>
<div id="container">
<header id="header">
    <div id="logo"><a href="index.html"><img src="images/logo.png" alt="MSB Logo"></a></div>
    <nav id="main-nav">
        <ul>
            <li><a href="uyeler.php" class="btn ">Üye Listesi</a></li>
            <li><a href="admin.php" class="btn ">Admin Paneli</a></li>
            <li><a href="logout.php" class="btn secondary">Çıkış</a></li>
            
        </ul>
    </nav>
</header>

<main id="content">
<h2>Yeni Üye Ekle</h2>

<form method="post">
    <label>Kullanıcı Adı</label>
    <input type="text" name="kulad" required>

    <label>Şifre</label>
    <input type="password" name="sifre" required>

    <label>Rol</label>
    <select name="rol">
        <option value="uye">Üye</option>
        <option value="admin">Admin</option>
    </select>

    <div class="form-actions">
        <button type="submit" class="btn">Ekle</button>
    </div>

    <?php if($hata != "") echo "<p style='color:red;'>$hata</p>"; ?>
</form>

</main>
<footer id="footer">
  <p>© <span id="year13"></span> MSB Library</p>
</footer>
</div>
<script>document.getElementById('year13').textContent = new Date().getFullYear();</script>
</body>
</html>
