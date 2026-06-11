<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM tenant
    WHERE id_tenant='$id'"
);

$tenant = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama_tenant'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query(
        $koneksi,
        "UPDATE tenant SET
        nama_tenant='$nama',
        deskripsi='$deskripsi'
        WHERE id_tenant='$id'"
    );

    echo "
    <script>
        alert('Data berhasil diupdate');
        document.location='tenant.php';
    </script>
    ";
}

include 'layout.php';
?>

<h2 class="mb-4">Edit Tenant</h2>

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST">

            <div class="mb-3">
                <label>Nama Tenant</label>

                <input
                    type="text"
                    name="nama_tenant"
                    class="form-control"
                    value="<?= $tenant['nama_tenant']; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>

                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="4"
                    required><?= $tenant['deskripsi']; ?></textarea>
            </div>

            <button
                type="submit"
                name="update"
                class="btn btn-primary">

                Update
            </button>

            <a href="tenant.php"
               class="btn btn-secondary">
               Kembali
            </a>

        </form>

    </div>
</div>

<?php include 'footer.php'; ?>