<?php
session_start();
require_once 'connect.php';

// Yalnızca admin erişimi
if(!isset($_SESSION['kulad']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}

// ID kontrolü
if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    // Mevcut durumu al
    $res = $conn->query("SELECT durum FROM kullanicilar WHERE id=$id");
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        //  aktifse pasif yap, pasifse aktif yap
        $yeni_durum = ($row['durum'] == 'aktif') ? 'pasif' : 'aktif';

        // Durumu güncelle
        $sql = "UPDATE kullanicilar SET durum='$yeni_durum' WHERE id=$id";
        if($conn->query($sql) === TRUE){
            header("Location: uyeler.php?durum=basarili");
            exit();
        } else {
            echo "Hata: " . $conn->error;
        }
    } else {
        echo "Üye bulunamadı!";
    }
} else {
    header("Location: uyeler.php");
    exit();
}
?>
