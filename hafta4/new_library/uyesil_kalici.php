<?php
session_start();
require_once 'connect.php';

if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $sql = "DELETE FROM kullanicilar WHERE id=$id";
    if($conn->query($sql) === TRUE){
        header("Location: uyeler.php");
        exit();
    } else {
        echo "Silme hatası: " . $conn->error;
    }
} else {
    header("Location: uyeler.php");
    exit();
}
?>
