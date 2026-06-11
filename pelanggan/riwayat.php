<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

$id_user = $_SESSION['id_user'];

$data = mysqli_query($koneksi,"
SELECT reservasi.*, meja.nomor_meja
FROM reservasi
JOIN meja ON reservasi.id_meja = meja.id_meja
WHERE reservasi.id_user='$id_user'
ORDER BY reservasi.id_reservasi DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Riwayat Reservasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
    <h4 class="mb-0">Riwayat Reservasi Saya</h4>
</div>

<div class="card-body">

<table class="table table-bordered">

<thead>

<tr>
<th>Meja</th>
<th>Tanggal</th>
<th>Jam</th>
<th>Jumlah Orang</th>
<th>Status</th>
</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($data)): ?>

<tr>

<td><?= $row['nomor_meja']; ?></td>

<td><?= $row['tanggal']; ?></td>

<td><?= $row['jam']; ?></td>

<td><?= $row['jumlah_orang']; ?></td>

<td>

<?php
if($row['status']=='Pending'){
    echo '<span class="badge bg-warning">Pending</span>';
}
elseif($row['status']=='Disetujui'){
    echo '<span class="badge bg-success">Disetujui</span>';
}
elseif($row['status']=='Selesai'){
    echo '<span class="badge bg-primary">Selesai</span>';
}
else{
    echo '<span class="badge bg-danger">Dibatalkan</span>';
}
?>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

<a href="dashboard.php"
   class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</div>

</body>
</html>