<?php
session_start();
require_once 'connect.php';

if(!isset($_SESSION['kulad']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Üye Listesi - MSB Library</title>
<link rel="stylesheet" href="css/genel.css">
</head>
<body class="body">
<div id="container">
<header id="header">
  <div id="logo"><a href="index.html"><img src="images/logo.png" alt="MSB Logo"></a></div>
  <nav id="main-nav">
    <ul>
      <li>Hoşgeldiniz, <?php echo $_SESSION['kulad']; ?></li>
      <li><a href="admin.php" class="btn ">Admin Paneli</a></li>
      <li><a href="uyeekle.php" class="btn">Yeni Üye Ekle</a></li>
      <li><a href="logout.php" class="btn secondary">Çıkış</a></li>
      
    </ul>
  </nav>
</header>

<main id="content">
<h2>Üye Listesi</h2>

<?php
$sql = "SELECT * FROM kullanicilar";
$result = $conn->query($sql);

if($result->num_rows > 0){
    echo '<table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:left;">';
    echo '<tr><th>ID</th><th>Kullanıcı Adı</th><th>Rol</th><th>Durum</th><th>İşlemler</th></tr>';
    
    while($row = $result->fetch_assoc()){
        $durum = isset($row['durum']) ? $row['durum'] : 'bilinmiyor';

        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['kulad'].'</td>';
        echo '<td>'.$row['rol'].'</td>';
        echo '<td>'.$durum.'</td>';
        echo '<td>';
        
        // Güncelle butonu
        echo '<a href="uyeguncelle.php?id='.$row['id'].'" class="btn">Güncelle</a> ';

        // Engelle / Aktifleştir butonu
        if($durum == 'aktif'){
            echo '<a href="uyesil.php?id='.$row['id'].'" class="btn secondary">Engelle</a> ';
        } else if($durum == 'pasif'){
            echo '<a href="uyesil.php?id='.$row['id'].'" class="btn secondary">Aktifleştir</a> ';
        }

        // Kalıcı silme butonu
        echo '<a href="uyesil_kalici.php?id='.$row['id'].'" class="btn danger" onclick="return confirm(\'Bu üyeyi kalıcı olarak silmek istediğinizden emin misiniz?\')">Sil</a>';

        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>Hiç üye bulunamadı.</p>';
}
?>

</main>

<footer id="footer">
  <p>© <span id="year9"></span> MSB Library</p>
</footer>
</div>

<script>document.getElementById('year9').textContent = new Date().getFullYear();</script>
</body>
</html>
