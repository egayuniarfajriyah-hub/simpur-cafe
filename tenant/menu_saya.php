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

$data = mysqli_query(
    $koneksi,
    "SELECT menu.*, tenant.nama_tenant
    FROM menu
    JOIN tenant ON menu.id_tenant = tenant.id_tenant
    WHERE menu.id_tenant='$id_tenant'
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#f4f6f9;
}

.page-title{
    font-weight:bold;
}

.card-custom{
    border:none;
    border-radius:20px;
}

.table th,
.table td{
    vertical-align:middle;
}

.foto-menu{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:10px;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="row mb-4">

    <div class="col-md-6">

        <h2 class="page-title">
            🍽️ Menu Tenant
        </h2>

        <p class="text-muted">
            Kelola daftar menu tenant Anda
        </p>

    </div>

    <div class="col-md-6 text-end">

        <a href="tambah_menu.php"
           class="btn btn-success btn-lg">

            <i class="bi bi-plus-circle"></i>
            Tambah Menu

        </a>

        <a href="dashboard.php"
           class="btn btn-secondary btn-lg">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

    </div>

</div>

<div class="card card-custom shadow-lg">

<div class="card-body">

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-dark">

<tr>
    <th width="60">No</th>
    <th>Tenant</th>
    <th>Foto</th>
    <th>Nama Menu</th>
    <th>Harga</th>
    <th>Deskripsi</th>
    <th width="180">Aksi</th>
</tr>

</thead>

<tbody>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($data)):
?>

<tr>

<td><?= $no++; ?></td>

<td>
<?= $row['nama_tenant']; ?>
</td>

<td>

<?php if(!empty($row['foto'])): ?>

<img
src="../uploads/<?= $row['foto']; ?>"
class="foto-menu">

<?php else: ?>

<span class="text-muted">
Tidak ada foto
</span>

<?php endif; ?>

</td>

<td>
<?= $row['nama_menu']; ?>
</td>

<td>
Rp <?= number_format($row['harga'],0,',','.'); ?>
</td>

<td>
<?= $row['deskripsi']; ?>
</td>

<td>

<a href="edit_menu.php?id=<?= $row['id_menu']; ?>"
class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>
Edit

</a>

<a href="hapus_menu.php?id=<?= $row['id_menu']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus menu ini?')">

<i class="bi bi-trash"></i>
Hapus

</a>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

</body>
</html>