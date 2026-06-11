<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

if(isset($_POST['simpan'])){

    $id_user = $_SESSION['id_user'];
    $id_meja = $_POST['id_meja'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $jumlah_orang = $_POST['jumlah_orang'];

    mysqli_query(
        $koneksi,
        "INSERT INTO reservasi
        (id_user,id_meja,tanggal,jam,jumlah_orang,status)
        VALUES
        ('$id_user','$id_meja','$tanggal','$jam','$jumlah_orang','Pending')"
    );

    echo "
    <script>
        alert('Reservasi berhasil dibuat');
        document.location='dashboard.php';
    </script>
    ";
}

$meja = mysqli_query(
    $koneksi,
    "SELECT * FROM meja
    WHERE status='Tersedia'"
);
?>

<!DOCTYPE html>
<html>
<head>

<title>Reservasi Meja</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header">
    <h3>Reservasi Meja</h3>
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Meja</label>

<select name="id_meja"
        class="form-select"
        required>

<?php while($m=mysqli_fetch_assoc($meja)): ?>

<option value="<?= $m['id_meja']; ?>">

<?= $m['nomor_meja']; ?>
(Kapasitas <?= $m['kapasitas']; ?> Orang)

</option>

<?php endwhile; ?>

</select>

</div>

<div class="mb-3">

<label>Tanggal</label>

<input type="date"
       name="tanggal"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Jam</label>

<input type="time"
       name="jam"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Jumlah Orang</label>

<input type="number"
       name="jumlah_orang"
       class="form-control"
       required>

</div>

<button type="submit"
        name="simpan"
        class="btn btn-primary">

Buat Reservasi

</button>

</form>

</div>

</div>

</div>

</body>
</html>