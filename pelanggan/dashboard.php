<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard Pelanggan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#f4f6f9;
}

.hero{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:white;
    border-radius:20px;
    padding:50px;
}

.feature-card{
    border:none;
    border-radius:18px;
    transition:.3s;
}

.feature-card:hover{
    transform:translateY(-5px);
}

.feature-icon{
    font-size:40px;
    margin-bottom:15px;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

<div class="container">

<a class="navbar-brand fw-bold" href="#">
☕ Simpur Cafe Reserve
</a>

<a href="../auth/logout.php"
   class="btn btn-danger">

Logout

</a>

</div>

</nav>

<div class="container py-4">

<div class="hero shadow mb-4">

<h1 class="fw-bold">
Selamat Datang, <?= $_SESSION['nama']; ?>
</h1>

<p class="fs-5 mb-4">
Nikmati kemudahan reservasi meja di Simpur Cafe.
Pesan meja favoritmu tanpa perlu antre.
</p>

<a href="reservasi.php"
   class="btn btn-light btn-lg">

<i class="bi bi-calendar-check"></i>
Reservasi Sekarang

</a>
<a href="riwayat.php"
   class="btn btn-outline-light btn-lg ms-2">

Riwayat Reservasi

</a>

</div>

<div class="row g-4 mb-4">

<div class="col-md-4">

<div class="card feature-card shadow-sm">

<div class="card-body text-center">

<div class="feature-icon">
🍽️
</div>

<h5>Reservasi Meja</h5>

<p class="text-muted">
Pesan meja dengan cepat dan mudah.
</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card feature-card shadow-sm">

<div class="card-body text-center">

<div class="feature-icon">
📅
</div>

<h5>Jadwal Reservasi</h5>

<p class="text-muted">
Lihat reservasi yang telah dibuat.
</p>

</div>

</div>

</div>

<div class="col-md-4">

<a href="menu.php"
   class="text-decoration-none text-dark">

<div class="card feature-card shadow-sm">

<div class="card-body text-center">

<div class="feature-icon">
🍽️
</div>

<h5>Menu Tenant</h5>

<p class="text-muted">
Lihat daftar makanan dan minuman yang tersedia.
</p>

</div>

</div>

</a>

</div>

</div>

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">

<h5 class="mb-0">
Informasi Pelanggan
</h5>

</div>

<div class="card-body">

<table class="table">

<tr>
<td width="200"><b>Nama</b></td>
<td><?= $_SESSION['nama']; ?></td>
</tr>

<tr>
<td><b>Status</b></td>
<td>Pelanggan Aktif</td>
</tr>

<tr>
<td><b>Akses</b></td>
<td>Reservasi Meja Online</td>
</tr>

</table>

</div>

</div>

</div>

</body>
</html>