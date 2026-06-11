<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';
include 'layout.php';

$totalTenant = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tenant"));
$totalMenu = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM menu"));
$totalMeja = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM meja"));
$totalReservasi = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM reservasi"));
$totalPelanggan = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM users WHERE role='pelanggan'"));
?>

<h2 class="mb-4">Laporan Sistem</h2>

<div class="card shadow-sm">

<div class="card-body">

    <table class="table table-bordered">

        <tr>
            <th width="300">Data</th>
            <th>Jumlah</th>
        </tr>

        <tr>
            <td>Total Tenant</td>
            <td><?= $totalTenant; ?></td>
        </tr>

        <tr>
            <td>Total Menu</td>
            <td><?= $totalMenu; ?></td>
        </tr>

        <tr>
            <td>Total Meja</td>
            <td><?= $totalMeja; ?></td>
        </tr>

        <tr>
            <td>Total Reservasi</td>
            <td><?= $totalReservasi; ?></td>
        </tr>

        <tr>
            <td>Total Pelanggan</td>
            <td><?= $totalPelanggan; ?></td>
        </tr>

    </table>

    <button onclick="window.print()"
            class="btn btn-success">

        Cetak Laporan

    </button>

</div>


</div>

<?php include 'footer.php'; ?>
