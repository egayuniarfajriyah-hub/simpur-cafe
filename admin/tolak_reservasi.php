<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query(
    $koneksi,
    "UPDATE reservasi
    SET status='Dibatalkan'
    WHERE id_reservasi='$id'"
);

header("Location: reservasi.php");
exit;