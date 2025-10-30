<?php
session_start();
require_once 'connect.php';
$host = "localhost";
$db   = "kutuphane";
$user = "root";
$pass = ""; 

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error) die("Bağlantı hatası: " . $conn->connect_error);

$hata = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $kulad = $_POST['kulad'];
    $sifre = hash('sha256', $_POST['sifre']);

    $sql = "SELECT * FROM kullanicilar WHERE kulad='$kulad' AND sifre='$sifre'";
    $res = $conn->query($sql);

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $_SESSION['kulad'] = $row['kulad'];
        $_SESSION['rol']   = $row['rol'];

        if($row['rol'] == 'admin'){
            header("Location: admin.php");
        } else {
            header("Location: uye.php");
        }
        exit();
    } else {
        $hata = "Kullanıcı adı veya şifre yanlış!";
    }
}
?>

<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Giriş - MSB Library</title>
<link rel="stylesheet" href="css/genel.css">
</head>
<body class="body">
<div id="container">
<header id="header">
  <div id="logo"><a href="index.html"><img src="images/logo.png" alt="MSB Logo"></a></div>
  <nav id="main-nav">
    <ul>
      <li><a href="index.html">Anasayfa</a></li>
      <li><a href="hakkimizda.html">Hakkımızda</a></li>
      <li><a href="misyon.html">Misyon</a></li>
      <li><a href="vizyon.html">Vizyon</a></li>
      <li><a href="iletisim.html">İletişim</a></li>
      <li><a href="login.php">Giriş</a></li>
    </ul>
  </nav>
</header>

<main id="content">
  <h2>Kullanıcı Girişi</h2>
  <div class="form-card">
    <form method="post">
      <label for="kulad">Kullanıcı Adı</label>
      <input id="kulad" name="kulad" type="text" required placeholder="Kullanıcı adınız">
      
      <label for="sifre">Şifre</label>
      <input id="sifre" name="sifre" type="password" required placeholder="Şifreniz">
      
      <div class="form-actions">
        <button type="submit" class="btn">Giriş Yap</button>
        <a href="iletisim.html" class="btn secondary">Şifremi Unuttum</a>
      </div>

      <?php if($hata != "") echo "<p style='color:red;margin-top:15px;'>$hata</p>"; ?>
    </form>
  </div>
</main>

<footer id="footer">
  <p>© <span id="year6"></span> MSB Library</p>
</footer>
</div>
<script>document.getElementById('year6').textContent = new Date().getFullYear();</script>
</body>
</html>
