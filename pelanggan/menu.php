<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

$data = mysqli_query(
    $koneksi,
    "SELECT menu.*, tenant.nama_tenant
    FROM menu
    JOIN tenant ON menu.id_tenant = tenant.id_tenant
    ORDER BY menu.id_menu DESC"
);
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Menu Tenant</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#f4f6f9;
}

.header-page{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:white;
    border-radius:20px;
    padding:30px;
    margin-bottom:30px;
}

.card-menu{
    border:none;
    border-radius:20px;
    overflow:hidden;
    transition:.3s;
}

.card-menu:hover{
    transform:translateY(-8px);
}

.foto-menu{
    width:100%;
    height:220px;
    object-fit:cover;
}

.harga{
    color:#16a34a;
    font-size:22px;
    font-weight:bold;
}

.badge-tenant{
    font-size:14px;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="header-page shadow">

<div class="d-flex justify-content-between align-items-center">

<div>

<h2 class="fw-bold">
🍽️ Menu Tenant
</h2>

<p class="mb-0">
Lihat berbagai pilihan makanan dan minuman
yang tersedia di Simpur Cafe.
</p>

</div>

<a href="dashboard.php"
class="btn btn-light">

<i class="bi bi-arrow-left"></i>
Kembali

</a>

</div>

</div>

<div class="row g-4">

<?php while($row=mysqli_fetch_assoc($data)): ?>

<div class="col-md-4">

<div class="card card-menu shadow h-100">

<?php if(!empty($row['foto'])): ?>

<img
src="../uploads/<?= $row['foto']; ?>"
class="foto-menu">

<?php else: ?>

<img
src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=1200"
class="foto-menu">

<?php endif; ?>

<div class="card-body">

<span class="badge bg-primary badge-tenant mb-2">

<?= $row['nama_tenant']; ?>

</span>

<h4 class="fw-bold">

<?= $row['nama_menu']; ?>

</h4>

<p class="text-muted">

<?= $row['deskripsi']; ?>

</p>

<div class="harga mb-3">

Rp <?= number_format($row['harga'],0,',','.'); ?>

</div>
<a href="reservasi.php"
class="btn btn-success w-100">

<i class="bi bi-calendar-check"></i>
Reservasi Sekarang

</a>

</div>

</div>

</div>

<?php endwhile; ?>

</div>

</div>

</body>
</html>