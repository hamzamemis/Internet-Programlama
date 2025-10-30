<?php
session_start();
require_once 'connect.php';

if(!isset($_SESSION['kulad']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: uyeler.php");
    exit();
}

$id = intval($_GET['id']);
$res = $conn->query("SELECT durum FROM kullanicilar WHERE id=$id");

if($res->num_rows == 0){
    header("Location: uyeler.php");
    exit();
}

$durum = $res->fetch_assoc()['durum'];
$yeniDurum = $durum == 'aktif' ? 'pasif' : 'aktif';

$conn->query("UPDATE kullanicilar SET durum='$yeniDurum' WHERE id=$id");

header("Location: uyeler.php");
exit();
?>
