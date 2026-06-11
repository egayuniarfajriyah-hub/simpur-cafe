<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

$id_user = $_SESSION['id_user'];

$tenant = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT * FROM tenant
        WHERE id_user='$id_user'"
    )
);

$id_tenant = $tenant['id_tenant'];

$totalMenu = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM menu
        WHERE id_tenant='$id_tenant'"
    )
);
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard Tenant</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#f4f6f9;
}

.hero{
    background:linear-gradient(135deg,#0f766e,#115e59);
    color:white;
    border-radius:25px;
    padding:45px;
}

.stat-card{
    border:none;
    border-radius:20px;
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
}

.menu-card{
    border:none;
    border-radius:20px;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

<div class="container">

<a class="navbar-brand fw-bold" href="#">

🏪 Tenant Simpur Cafe

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

Selamat Datang,
<?= $_SESSION['nama']; ?>

</h1>

<p class="fs-5 mb-0">

Kelola menu tenant Anda dengan mudah melalui dashboard ini.

</p>

</div>

<div class="row g-4 mb-4">

<div class="col-md-4">

<div class="card stat-card shadow">

<div class="card-body text-center">

<h1 class="text-success fw-bold">

<?= $totalMenu; ?>

</h1>

<h5>Total Menu</h5>

<p class="text-muted mb-0">

Menu yang telah ditambahkan

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card stat-card shadow">

<div class="card-body text-center">

<h1 class="text-primary fw-bold">

Aktif

</h1>

<h5>Status Tenant</h5>

<p class="text-muted mb-0">

Tenant sedang aktif

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card stat-card shadow">

<div class="card-body text-center">

<h1 class="text-warning fw-bold">

Tenant

</h1>

<h5>Role Akun</h5>

<p class="text-muted mb-0">

Akses pengelola menu

</p>

</div>

</div>

</div>

</div>
<div class="card menu-card shadow">

<div class="card-body p-5">

<div class="row align-items-center">

<div class="col-md-8">

<h2 class="fw-bold mb-3">

🍽️ Kelola Menu Saya

</h2>

<p class="text-muted mb-4">

Tambah, edit, dan hapus menu tenant Anda dengan mudah.
Semua menu yang Anda tambahkan akan langsung terlihat oleh pelanggan.

</p>

<a href="menu_saya.php"
class="btn btn-success btn-lg">

<i class="bi bi-journal-text"></i>
Kelola Menu

</a>

</div>

<div class="col-md-4 text-center">

<div style="font-size:90px;">

🍜

</div>

</div>

</div>

</div>

</div>

<div class="card shadow border-0 mt-4">

<div class="card-header bg-success text-white">

<h5 class="mb-0">

Informasi Tenant

</h5>

</div>

<div class="card-body">

<table class="table">

<tr>

<td width="200">

<b>Nama Tenant</b>

</td>

<td>

<?= $_SESSION['nama']; ?>

</td>

</tr>

<tr>

<td>

<b>Status</b>

</td>

<td>

<span class="badge bg-success">

Aktif

</span>

</td>

</tr>

<tr>

<td>

<b>Role</b>

</td>

<td>

Tenant

</td>

</tr>

<tr>

<td>

<b>Total Menu</b>

</td>

<td>

<?= $totalMenu; ?> Menu

</td>

</tr>

</table>

</div>

</div>

</div>

</body>

</html>