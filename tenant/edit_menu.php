<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query(
        $koneksi,
        "SELECT * FROM menu
        WHERE id_menu='$id'"
    )
);

if(isset($_POST['update'])){

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

        mysqli_query(
            $koneksi,
            "UPDATE menu SET
            nama_menu='$nama_menu',
            harga='$harga',
            deskripsi='$deskripsi',
            foto='$foto'
            WHERE id_menu='$id'"
        );

    }else{

        mysqli_query(
            $koneksi,
            "UPDATE menu SET
            nama_menu='$nama_menu',
            harga='$harga',
            deskripsi='$deskripsi'
            WHERE id_menu='$id'"
        );

    }

    echo "
    <script>
    alert('Menu berhasil diperbarui');
    window.location='menu_saya.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Menu</title>

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
    background:#ffc107;
    padding:20px;
    border-radius:20px 20px 0 0;
}

.preview{
    width:120px;
    border-radius:10px;
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
✏️ Edit Menu
</h3>

</div>

<div class="card-body p-4">

<form method="POST"
      enctype="multipart/form-data">

<div class="mb-3">

<label>Nama Menu</label>

<input
type="text"
name="nama_menu"
class="form-control"
value="<?= $data['nama_menu']; ?>"
required>

</div>

<div class="mb-3">

<label>Harga</label>

<input
type="number"
name="harga"
class="form-control"
value="<?= $data['harga']; ?>"
required>

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control"
rows="4"><?= $data['deskripsi']; ?></textarea>

</div>

<div class="mb-3">

<label>Foto Saat Ini</label>
<br>

<?php if($data['foto'] != NULL): ?>

<img
src="../uploads/<?= $data['foto']; ?>"
class="preview">

<?php else: ?>

<p class="text-muted">
Belum ada foto
</p>

<?php endif; ?>

</div>

<div class="mb-4">

<label>Ganti Foto</label>

<input
type="file"
name="foto"
class="form-control">

</div>

<button
type="submit"
name="update"
class="btn btn-warning">

Update Menu

</button>

<a href="menu_saya.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>