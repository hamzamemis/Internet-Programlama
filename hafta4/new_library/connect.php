<?php
// ===============================
// Veritabanı bağlantı ayarları
// ===============================

$servername = "localhost";   
$username   = "root";        
$password   = "";            
$database   = "kutuphane";  

// ===============================
// Bağlantı oluştur
// ===============================
$conn = new mysqli($servername, $username, $password, $database);

// ===============================
// Bağlantı hatası kontrolü
// ===============================
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// Bağlantı başarılıysa devam et
?>
