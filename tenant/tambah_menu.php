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

if(isset($_POST['simpan'])){

    $id_tenant = $_POST['id_tenant'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if($foto != ''){

        move_uploaded_file(
            $tmp,
            "../uploads/".$foto
        );

    }

    mysqli_query(
        $koneksi,
        "INSERT INTO menu
        (
            id_tenant,
            nama_menu,
            harga,
            deskripsi,
            foto
        )
        VALUES
        (
            '$id_tenant',
            '$nama_menu',
            '$harga',
            '$deskripsi',
            '$foto'
        )"
    );

    echo "
    <script>
        alert('Menu berhasil ditambahkan');
        window.location='menu_saya.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tambah Menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.card-form{
    border:none;
    border-radius:20px;
}

.header-form{
    background:linear-gradient(135deg,#198754,#157347);
    color:white;
    padding:25px;
    border-radius:20px 20px 0 0;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card card-form shadow-lg">

<div class="header-form">

<h3 class="mb-0">
🍽️ Tambah Menu Tenant
</h3>

</div>

<div class="card-body p-4">

<form method="POST" enctype="multipart/form-data">

<input
type="hidden"
name="id_tenant"
value="<?= $tenant['id_tenant']; ?>">

<div class="mb-3">

<label class="form-label">
Tenant
</label>

<input
type="text"
class="form-control"
value="<?= $tenant['nama_tenant']; ?>"
readonly>

</div>

<div class="mb-3">

<label class="form-label">
Nama Menu
</label>

<input
type="text"
name="nama_menu"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Harga
</label>

<input
type="number"
name="harga"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Deskripsi
</label>

<textarea
name="deskripsi"
class="form-control"
rows="4"></textarea>

</div>

<div class="mb-4">

<label class="form-label">
Foto Menu
</label>

<input
type="file"
name="foto"
class="form-control"
accept="image/*">

</div>

<div class="d-flex gap-2">

<button
type="submit"
name="simpan"
class="btn btn-success">

Simpan Menu

</button>

<a href="menu_saya.php"
class="btn btn-secondary">

Kembali

</a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>