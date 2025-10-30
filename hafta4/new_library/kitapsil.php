<?php
session_start();
require_once 'connect.php';

// Admin kontrolü
if(!isset($_SESSION['kulad']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}

// id parametresi var mı kontrol et
if(isset($_GET['id'])){
    $id = intval($_GET['id']); 
    $sql = "DELETE FROM kitaplar WHERE id=$id";
    if($conn->query($sql) === TRUE){
        header("Location: kitaplar.php?mesaj=Silindi");
        exit();
    } else {
        echo "Hata: " . $conn->error;
    }
} else {
    header("Location: kitaplar.php");
    exit();
}
?>
