<?php
session_start();
require_once 'connect.php';

// Admin kontrolü
if(!isset($_SESSION['kulad']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}

// Ayarların veritabanından çekilmesi
$sql = "CREATE TABLE IF NOT EXISTS ayarlar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    site_adi VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tema_rengi VARCHAR(20) DEFAULT '#26a69a'
)";
$conn->query($sql);

// Varsayılan ayarları ekle (tablo boşsa)
$res = $conn->query("SELECT COUNT(*) as count FROM ayarlar");
$row = $res->fetch_assoc();
if($row['count'] == 0){
    $conn->query("INSERT INTO ayarlar (site_adi, email, tema_rengi) VALUES ('MSB Library', 'info@msblibrary.com', '#26a69a')");
}

// Ayarları çek
$ayarlar = $conn->query("SELECT * FROM ayarlar LIMIT 1")->fetch_assoc();
$mesaj = "";

// Form gönderildiyse güncelle
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $site_adi = $_POST['site_adi'];
    $email    = $_POST['email'];
    $tema     = $_POST['tema_rengi'];

    $sql = "UPDATE ayarlar SET site_adi='$site_adi', email='$email', tema_rengi='$tema' WHERE id=1";
    if($conn->query($sql)){
        $mesaj = "<p style='color:green;'>Ayarlar başarıyla güncellendi!</p>";
        $ayarlar['site_adi'] = $site_adi;
        $ayarlar['email'] = $email;
        $ayarlar['tema_rengi'] = $tema;
    } else {
        $mesaj = "<p style='color:red;'>Hata: ".$conn->error."</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayarlar - MSB Library</title>
    <link rel="stylesheet" href="css/genel.css">
</head>
<body>
<div id="container">
    <header id="header">
        <div id="logo"><a href="index.html"><img src="images/logo.png" alt="MSB Logo"></a></div>
        <nav id="main-nav">
            <ul>
                <li>Hoşgeldiniz, <?php echo $_SESSION['kulad']; ?></li>
                <li><a href="admin.php" class="btn">Admin Paneli</a></li>
                <li><a href="logout.php" class="btn secondary">Çıkış</a></li>
            </ul>
        </nav>
    </header>

    <main id="content">
        <h2>Site Ayarları</h2>

        <?php echo $mesaj; ?>

        <form method="post">
            <label>Site Adı</label>
            <input type="text" name="site_adi" value="<?php echo htmlspecialchars($ayarlar['site_adi']); ?>" required>

            <label>Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($ayarlar['email']); ?>" required>

            <label>Tema Rengi</label>
            <input type="color" name="tema_rengi" value="<?php echo htmlspecialchars($ayarlar['tema_rengi']); ?>">

            <button type="submit" class="btn">Güncelle</button>
        </form>
    </main>

    <footer id="footer">
        <p>© <span id="year"></span> MSB Library</p>
    </footer>
</div>

<script>
document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>
