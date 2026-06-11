<?php
include 'config/koneksi.php';

$totalTenant = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM tenant")
);

$totalMenu = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM menu")
);

$totalReservasi = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM reservasi")
);

$totalPelanggan = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM users
        WHERE role='pelanggan'"
    )
);
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Simpur Cafe Reserve</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f8fafc;
}

/* NAVBAR */

.navbar-custom{
    background:#0f172a;
    padding:10px 0;
}

.logo-brand{
    font-size:24px;
    font-weight:700;
    color:white !important;
}

.btn-login{
    border:1px solid white;
    color:white;
}

.btn-login:hover{
    background:white;
    color:black;
}

.btn-daftar{
    background:#f59e0b;
    color:white;
    border:none;
}

.btn-daftar:hover{
    background:#d97706;
    color:white;
}

/* HERO */

.hero{
    padding-top:80px;
    min-height:70vh;
    background:
    linear-gradient(
    rgba(0,0,0,0.65),
    rgba(0,0,0,0.65)
    ),
    url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1600');

    background-size:cover;
    background-position:center;

    display:flex;
    align-items:center;
}

.hero-content{
    color:white;
    max-width:800px;
    margin:auto;
    text-align:center;
}

.hero-badge{
    background:rgba(255,255,255,0.15);
    padding:10px 18px;
    border-radius:50px;
    display:inline-block;
    margin-bottom:20px;
}

.hero h1{
    font-size:52px;
    font-weight:700;
    line-height:1.3;
    max-width:700px;
    margin:auto;
    text-align:center;
}

.hero p{
    font-size:18px;
    color:#e2e8f0;
    max-width:700px;
    margin:20px auto;
    text-align:center;
}

.btn-hero{
    padding:12px 24px;
    font-size:16px;
    border-radius:12px;
}

.btn-primary-custom{
    background:#f59e0b;
    border:none;
    color:white;
}

.btn-primary-custom:hover{
    background:#d97706;
}

.btn-secondary-custom{
    background:transparent;
    border:2px solid white;
    color:white;
}

.btn-secondary-custom:hover{
    background:white;
    color:#0f172a;
}

.hero-stats{
    margin-top:40px;
}

.hero-box{
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(8px);
    padding:20px;
    border-radius:18px;
    text-align:center;
}

.hero-box h2{
    font-weight:700;
    margin-bottom:5px;
}

.hero-box p{
    margin:0;
    font-size:14px;
    color:#f1f5f9;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">

<div class="container">

<a class="navbar-brand logo-brand" href="#">
☕ Simpur Cafe
</a>

<div>

<a href="auth/login.php"
   class="btn btn-login me-2">

Login

</a>

<a href="auth/register.php"
   class="btn btn-daftar">

Daftar

</a>

</div>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="hero-content">

<h1>
Simpur Cafe Reserve
</h1>
<h5 class="text-warning mb-3">
Reservasi Mudah • Cepat • Nyaman
</h5>

<p>

Sistem reservasi online yang memudahkan
pelanggan memesan meja, melihat tenant,
dan menikmati layanan cafe dengan lebih nyaman.

</p>

<div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">

<a href="auth/login.php"
class="btn btn-primary-custom btn-hero">

Reservasi Sekarang

</a>

<a href="#fitur"
   class="btn btn-secondary-custom btn-hero">

Pelajari Lebih Lanjut

</a>

</div>

</div>

</div>

</section>
<!-- FITUR -->

<section id="fitur" class="py-5" style="margin-top:-20px;">
    <section id="fitur" class="py-5">

<div class="container">

<div class="bg-white shadow rounded-4 p-5">

<div class="text-center mb-5">

<h2 class="fw-bold">
Kenapa Memilih Simpur Cafe?
</h2>

<p class="text-muted">
Nikmati pengalaman reservasi yang cepat,
mudah, dan nyaman.
</p>

</div>

<div class="row g-4">

<div class="col-md-4">

<div class="card border-0 shadow h-100">

<div class="card-body text-center p-4">

<div style="font-size:48px;">
<i class="bi bi-lightning-charge-fill text-warning"></i>
</div>

<h4 class="mt-3">
Reservasi Cepat
</h4>

<p class="text-muted">

Pelanggan dapat melakukan reservasi meja
hanya dalam beberapa langkah sederhana.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card border-0 shadow h-100">

<div class="card-body text-center p-4">

<div style="font-size:48px;">
<i class="bi bi-shop text-success"></i>
</div>

<h4 class="mt-3">
Multi Tenant
</h4>

<p class="text-muted">

Beragam tenant makanan dan minuman
tersedia dalam satu tempat.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card border-0 shadow h-100">

<div class="card-body text-center p-4">

<div style="font-size:48px;">
<i class="bi bi-phone text-primary"></i>
</div>

<h4 class="mt-3">
Mudah Digunakan
</h4>

<p class="text-muted">

Tampilan sederhana dan responsif
untuk semua perangkat.

</p>

</div>

</div>

</div>

</div>

</div>
</div>
</section>

<!-- STATISTIK -->

<section class="py-5 bg-white">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold">
Statistik Sistem
</h2>

<p class="text-muted">
Data terbaru dari Simpur Cafe Reserve
</p>

</div>

<div class="row g-4">

<div class="col-md-3">

<div class="card border-0 shadow-lg text-center">

<div class="card-body p-4">

<h1 class="fw-bold text-primary">
<?= $totalTenant; ?>
</h1>

<h5>
Tenant
</h5>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card border-0 shadow-lg text-center">

<div class="card-body p-4">

<h1 class="fw-bold text-success">
<?= $totalMenu; ?>
</h1>

<h5>
Menu
</h5>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card border-0 shadow-lg text-center">

<div class="card-body p-4">

<h1 class="fw-bold text-warning">
<?= $totalReservasi; ?>
</h1>

<h5>
Reservasi
</h5>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card border-0 shadow-lg text-center">

<div class="card-body p-4">

<h1 class="fw-bold text-danger">
<?= $totalPelanggan; ?>
</h1>

<h5>
Pelanggan
</h5>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- TENTANG -->

<section class="py-5">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-6">

<img
src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1200"
class="img-fluid rounded-4 shadow">

</div>

<div class="col-lg-6 text-center">

<h2 class="fw-bold mb-4">
Tentang Simpur Cafe
</h2>

<p class="text-muted">

Simpur Cafe merupakan tempat kuliner modern
yang menghadirkan berbagai tenant makanan dan
minuman dalam satu lokasi. Sistem Simpur Cafe
Reserve dibuat untuk mempermudah pelanggan
melakukan reservasi meja secara online dan
memberikan pengalaman pelayanan yang lebih baik.

</p>

<p class="text-muted">

Melalui platform ini, admin dapat mengelola
tenant, menu, reservasi, serta aktivitas pelanggan
secara terintegrasi.

</p>

</div>

</div>

</div>

</section>
<!-- TENANT UNGGULAN -->

<section class="py-5 bg-light">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold">
Tenant Unggulan
</h2>

<p class="text-muted">
Pilihan tenant favorit pelanggan Simpur Cafe
</p>

</div>

<div class="row g-4">

<?php

$tenantLanding = mysqli_query(
    $koneksi,
    "SELECT * FROM tenant
    ORDER BY id_tenant DESC
    LIMIT 4"
);

while($t = mysqli_fetch_assoc($tenantLanding)):

?>

<div class="col-md-3">

<div class="card border-0 shadow-lg h-100">

<div class="card-body text-center p-4">

<div style="
width:90px;
height:90px;
background:#f59e0b;
border-radius:50%;
margin:auto;
display:flex;
align-items:center;
justify-content:center;
">

<i class="bi bi-shop text-white"
style="font-size:35px;"></i>

</div>

<h5 class="mt-4">

<?= $t['nama_tenant']; ?>

</h5>

<p class="text-muted">

<?= $t['deskripsi']; ?>

</p>

</div>

</div>

</div>

<?php endwhile; ?>

</div>

</div>

</section>

<!-- LANGKAH RESERVASI -->

<section class="py-5">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold">
Cara Reservasi
</h2>

<p class="text-muted">
Hanya membutuhkan beberapa langkah mudah
</p>

</div>

<div class="row g-4">

<div class="col-md-4">

<div class="card border-0 shadow text-center h-100">

<div class="card-body p-4">

<div style="font-size:48px;">
<i class="bi bi-person-plus-fill text-primary"></i>
</div>

<h4>
Daftar Akun
</h4>

<p class="text-muted">

Buat akun pelanggan terlebih dahulu
untuk menggunakan layanan reservasi.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card border-0 shadow text-center h-100">

<div class="card-body p-4">
<div style="font-size:48px;">
<i class="bi bi-calendar-check-fill text-success"></i>
</div>

<h4>
Pilih Meja
</h4>

<p class="text-muted">

Tentukan tanggal, jam, dan meja yang
ingin digunakan.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card border-0 shadow text-center h-100">

<div class="card-body p-4">

<div style="font-size:48px;">
<i class="bi bi-cup-hot-fill text-danger"></i>
</div>

<h4>
Nikmati Layanan
</h4>

<p class="text-muted">

Datang sesuai jadwal reservasi dan
nikmati pengalaman terbaik di Simpur Cafe.

</p>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- CTA -->

<section
class="py-5"
style="
background:linear-gradient(135deg,#0f172a,#1e293b);
color:white;
">

<div class="container text-center">

<h2 class="fw-bold mb-3">

Siap Melakukan Reservasi?

</h2>

<p class="mb-4">

Nikmati kemudahan reservasi online dan
berbagai pilihan tenant terbaik.

</p>

<a href="auth/register.php"
class="btn btn-warning btn-lg">

Daftar Sekarang

</a>

<a href="auth/login.php"
class="btn btn-outline-light btn-lg">

Login

</a>

</div>

</section>
<!-- FOOTER -->

<footer
style="
background:#020617;
color:white;
padding:60px 0 20px;
">

<div class="container">

<div class="row">

<div class="col-md-4">

<h4 class="fw-bold mb-3">
☕ Simpur Cafe Reserve
</h4>

<p style="color:#cbd5e1;">

Sistem Informasi Reservasi Cafe yang
memudahkan pelanggan melakukan reservasi
meja secara online serta membantu pengelolaan
tenant dan layanan cafe secara terintegrasi.

</p>

</div>

<div class="col-md-4">

<h5 class="fw-bold mb-3">
Menu
</h5>

<ul class="list-unstyled">

<li class="mb-2">
<a href="#fitur"
style="text-decoration:none;color:#cbd5e1;">
Fitur
</a>
</li>

<li class="mb-2">
<a href="#"
style="text-decoration:none;color:#cbd5e1;">
Tenant
</a>
</li>

<li class="mb-2">
<a href="auth/login.php"
style="text-decoration:none;color:#cbd5e1;">
Login
</a>
</li>

<li class="mb-2">
<a href="auth/register.php"
style="text-decoration:none;color:#cbd5e1;">
Registrasi
</a>
</li>

</ul>

</div>

<div class="col-md-4">

<h5 class="fw-bold mb-3">
Kontak
</h5>

<p style="color:#cbd5e1;">
📍 Bandar Lampung, Lampung
</p>

<p style="color:#cbd5e1;">
📞 0812-3456-7890
</p>

<p style="color:#cbd5e1;">
✉️ admin@simpurcafe.com
</p>

</div>

</div>

<hr style="border-color:#334155;">

<div class="text-center">

<p class="mb-0" style="color:#94a3b8;">

© <?= date('Y'); ?> Simpur Cafe Reserve.
Semua Hak Dilindungi.

</p>

</div>

</div>

</footer>

</body>
</html>