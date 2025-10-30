<?php
session_start();
require_once 'connect.php';

if(!isset($_SESSION['kulad']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}

$hata = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $baslik = $conn->real_escape_string($_POST['baslik']);
    $yazar     = $conn->real_escape_string($_POST['yazar']);
    $yayin_yili = intval($_POST['yayin_yili']);

    if($baslik && $yazar && $yayin_yili){
        $sql = "INSERT INTO kitaplar (baslik, yazar, yayin_yili) VALUES ('$baslik','$yazar','$yayin_yili')";
        if($conn->query($sql)){
            header("Location: kitaplar.php");
            exit();
        } else {
            $hata = "Kitap eklenirken bir hata oluştu!";
        }
    } else {
        $hata = "Lütfen tüm alanları doldurun!";
    }
}
?>

<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Yeni Kitap Ekle - Admin</title>
<link rel="stylesheet" href="css/genel.css">
</head>
<body>
<div id="container">
<header id="header">
    <div id="logo"><a href="index.html"><img src="images/logo.png" alt="MSB Logo"></a></div>
    <nav id="main-nav">
        <ul>
            <li><a href="kitaplar.php" class="btn">Kitap Listesi</a></li>
            <li><a href="admin.php" class="btn">Admin Paneli</a></li>
            <li><a href="logout.php" class="btn secondary">Çıkış</a></li>
        </ul>
    </nav>
</header>

<main id="content">
<h2>Yeni Kitap Ekle</h2>

<form method="post">
    <label for="baslik">Kitap Adı</label>
    <input type="text" name="baslik" id="baslik" required>

    <label for="yazar">Yazar</label>
    <input type="text" name="yazar" id="yazar" required>

    <label for="yayin_yili">Yayın Yılı</label>
    <input type="number" name="yayin_yili" id="yayin_yili" required>

    <div class="form-actions">
        <button type="submit" class="btn">Ekle</button>
    </div>

    <?php if($hata != "") echo "<p style='color:red;'>$hata</p>"; ?>
</form>

</main>
<footer id="footer">
  <p>© <span id="year16"></span> MSB Library</p>
</footer>
</div>
<script>document.getElementById('year16').textContent = new Date().getFullYear();</script>
</body>
</html>
