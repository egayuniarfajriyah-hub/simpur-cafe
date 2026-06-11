<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';
include 'layout.php';

$data = mysqli_query($koneksi,"SELECT * FROM meja");
?>

<h2 class="mb-4">Data Meja</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <a href="tambah_meja.php"
           class="btn btn-primary mb-3">

           + Tambah Meja

        </a>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>
                    <th>No</th>
                    <th>Nomor Meja</th>
                    <th>Kapasitas</th>
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

                    <td><?= $row['nomor_meja']; ?></td>

                    <td><?= $row['kapasitas']; ?> Orang</td>

                    <td>

                        <?php if($row['status']=='Tersedia'): ?>

                            <span class="badge bg-success">
                                Tersedia
                            </span>

                        <?php else: ?>

                            <span class="badge bg-danger">
                                Terisi
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <a href="edit_meja.php?id=<?= $row['id_meja']; ?>"
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <a href="hapus_meja.php?id=<?= $row['id_meja']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus data?')">

                           Hapus

                        </a>

                    </td>

                </tr>

            <?php endwhile; ?>

            </tbody>

        </table>

    </div>

</div>

<?php include 'footer.php'; ?>