<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';
include 'layout.php';

$data = mysqli_query($koneksi,"
SELECT reservasi.*,
       users.nama,
       meja.nomor_meja
FROM reservasi
JOIN users ON reservasi.id_user = users.id_user
JOIN meja ON reservasi.id_meja = meja.id_meja
ORDER BY id_reservasi DESC
");
?>

<h2 class="mb-4">Data Reservasi</h2>

<div class="card shadow-sm">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>
    <th>No</th>
    <th>Pelanggan</th>
    <th>Meja</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Jumlah Orang</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

</thead>

<tbody>

<?php
$no=1;

while($row=mysqli_fetch_assoc($data)):
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $row['nama']; ?></td>

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
<td>

<?php if($row['status']=='Pending'): ?>

<a href="approve_reservasi.php?id=<?= $row['id_reservasi']; ?>"
   class="btn btn-success btn-sm">

Approve

</a>

<a href="tolak_reservasi.php?id=<?= $row['id_reservasi']; ?>"
   class="btn btn-danger btn-sm">

Tolak

</a>

<?php else: ?>

-

<?php endif; ?>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

</div>

</div>

<?php include 'footer.php'; ?>