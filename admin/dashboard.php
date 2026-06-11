<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

$totalTenant = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM tenant")
);

$totalMenu = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM menu")
);

$totalMeja = mysqli_num_rows(
    mysqli_query($koneksi,"SELECT * FROM meja")
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

$totalPending = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM reservasi
        WHERE status='Pending'"
    )
);

$totalDisetujui = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM reservasi
        WHERE status='Disetujui'"
    )
);

$totalDitolak = mysqli_num_rows(
    mysqli_query(
        $koneksi,
        "SELECT * FROM reservasi
        WHERE status='Dibatalkan'"
    )
);

include 'layout.php';
?>

<h2 class="fw-bold">
Dashboard Admin
</h2>

<p class="text-muted">
Selamat datang, <?= $_SESSION['nama']; ?>
</p>

<div class="row g-4">

    <div class="col-md-3">

        <div class="card card-dashboard card-blue shadow">

            <div class="card-body text-center">

                <h1><?= $totalTenant; ?></h1>

                <h5>Total Tenant</h5>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card card-dashboard card-green shadow">

            <div class="card-body text-center">

                <h1><?= $totalMenu; ?></h1>

                <h5>Total Menu</h5>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card card-dashboard card-orange shadow">

            <div class="card-body text-center">

                <h1><?= $totalMeja; ?></h1>

                <h5>Total Meja</h5>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card card-dashboard card-purple shadow">

            <div class="card-body text-center">

                <h1><?= $totalReservasi; ?></h1>

                <h5>Total Reservasi</h5>

            </div>

        </div>

    </div>

</div>

<div class="row g-4 mt-2">

    <div class="col-md-3">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h2><?= $totalPending; ?></h2>

                <p class="mb-0">
                    Reservasi Pending
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h2><?= $totalDisetujui; ?></h2>

                <p class="mb-0">
                    Reservasi Disetujui
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h2><?= $totalDitolak; ?></h2>

                <p class="mb-0">
                    Reservasi Ditolak
                </p>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h2><?= $totalPelanggan; ?></h2>

                <p class="mb-0">
                    Total Pelanggan
                </p>

            </div>

        </div>

    </div>

</div>

<div class="card shadow border-0 mt-4">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">
            Ringkasan Sistem Simpur Cafe
        </h5>

    </div>

    <div class="card-body">

        <p>
            Sistem Reservasi Simpur Cafe digunakan untuk mengelola tenant,
            menu makanan, data meja, reservasi pelanggan, dan aktivitas tenant
            dalam satu platform terintegrasi.
        </p>

        <ul>

            <li>Total Tenant : <?= $totalTenant; ?></li>

            <li>Total Menu : <?= $totalMenu; ?></li>

            <li>Total Meja : <?= $totalMeja; ?></li>

            <li>Total Reservasi : <?= $totalReservasi; ?></li>

            <li>Total Pelanggan : <?= $totalPelanggan; ?></li>

        </ul>

    </div>

</div>

<?php include 'footer.php'; ?>