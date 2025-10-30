<?php
session_start();
require_once 'connect.php';

// Admin kontrolü
if(!isset($_SESSION['kulad']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}

// ID kontrolü
if(!isset($_GET['id'])){
    header("Location: uyeler.php");
    exit();
}

$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM kullanicilar WHERE id=$id");

if($res->num_rows == 0){
    header("Location: uyeler.php");
    exit();
}

$uye = $res->fetch_assoc();
$hata = "";

// Form gönderildiğinde güncelle
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $kulad = $conn->real_escape_string($_POST['kulad']);
    $rol   = $_POST['rol'] === 'admin' ? 'admin' : 'uye';
    $durum = $_POST['durum'] === 'pasif' ? 'pasif' : 'aktif';

    $sql = "UPDATE kullanicilar SET kulad='$kulad', rol='$rol', durum='$durum' WHERE id=$id";
    if($conn->query($sql)){
        header("Location: uyeler.php");
        exit();
    } else {
        $hata = "Güncelleme sırasında bir hata oluştu!";
    }
}
?>

<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Üye Güncelle - Admin</title>
<link rel="stylesheet" href="css/genel.css">
</head>
<body>
<div id="container">
<header id="header">
    <div id="logo"><a href="index.html"><img src="images/logo.png" alt="MSB Logo"></a></div>
    <nav id="main-nav">
        <ul>
            <li><a href="uyeler.php" class="btn">Üye Listesi</a></li>
            <li><a href="logout.php" class="btn secondary">Çıkış</a></li>
        </ul>
    </nav>
</header>

<main id="content">
<h2>Üye Güncelle</h2>

<form method="post">
    <label for="kulad">Kullanıcı Adı</label>
    <input type="text" name="kulad" id="kulad" required value="<?= htmlspecialchars($uye['kulad']) ?>">

    <label for="rol">Rol</label>
    <select name="rol" id="rol">
        <option value="uye" <?= $uye['rol']=='uye'?'selected':'' ?>>Üye</option>
        <option value="admin" <?= $uye['rol']=='admin'?'selected':'' ?>>Admin</option>
    </select>

    <label for="durum">Durum</label>
    <select name="durum" id="durum">
        <option value="aktif" <?= $uye['durum']=='aktif'?'selected':'' ?>>Aktif</option>
        <option value="pasif" <?= $uye['durum']=='pasif'?'selected':'' ?>>Pasif</option>
    </select>

    <div class="form-actions">
        <button type="submit" class="btn">Güncelle</button>
    </div>

    <?php if($hata != "") echo "<p style='color:red;'>$hata</p>"; ?>
</form>

</main>
<footer id="footer">
  <p>© <span id="year14"></span> MSB Library</p>
</footer>
</div>
<script>document.getElementById('year14').textContent = new Date().getFullYear();</script>
</body>
</html>
