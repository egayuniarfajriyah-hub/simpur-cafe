<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';
include 'layout.php';

$data = mysqli_query($koneksi,"SELECT * FROM tenant");
?>

<h2 class="mb-4">Data Tenant</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <a href="tambah_tenant.php" class="btn btn-primary mb-3">
            + Tambah Tenant
        </a>

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>
                    <th width="80">No</th>
                    <th>Nama Tenant</th>
                    <th>Deskripsi</th>
                    <th width="150">Aksi</th>
                </tr>

            </thead>

            <tbody>

            <?php
            $no = 1;

            while($row = mysqli_fetch_assoc($data)):
            ?>

                <tr>

                    <td><?= $no++; ?></td>

                    <td><?= $row['nama_tenant']; ?></td>

                    <td><?= $row['deskripsi']; ?></td>

                    <td>

                       <a href="edit_tenant.php?id=<?= $row['id_tenant']; ?>"
   class="btn btn-warning btn-sm">
   Edit
</a>

                        <a href="hapus_tenant.php?id=<?= $row['id_tenant']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin ingin menghapus tenant ini?')">

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