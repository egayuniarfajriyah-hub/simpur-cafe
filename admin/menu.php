<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';
include 'layout.php';

$data = mysqli_query($koneksi,"
SELECT menu.*, tenant.nama_tenant
FROM menu
JOIN tenant ON menu.id_tenant = tenant.id_tenant
");
?>

<h2 class="mb-4">Data Menu</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <a href="tambah_menu.php"
           class="btn btn-primary mb-3">

            + Tambah Menu

        </a>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>
                    <th>No</th>
                    <th>Tenant</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
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

                    <td><?= $row['nama_tenant']; ?></td>

                    <td><?= $row['nama_menu']; ?></td>

                    <td>
                        Rp <?= number_format($row['harga']); ?>
                    </td>

                    <td><?= $row['deskripsi']; ?></td>

                    <td>

                        <a href="edit_menu.php?id=<?= $row['id_menu']; ?>"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <a href="hapus_menu.php?id=<?= $row['id_menu']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus menu?')">

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