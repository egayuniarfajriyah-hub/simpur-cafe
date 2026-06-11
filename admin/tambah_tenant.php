<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_tenant'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query(
        $koneksi,
        "INSERT INTO tenant
        (nama_tenant,deskripsi)
        VALUES
        ('$nama','$deskripsi')"
    );

    echo "
    <script>
        alert('Tenant berhasil ditambahkan');
        document.location='tenant.php';
    </script>
    ";
}

include 'layout.php';
?>

<h2 class="mb-4">Tambah Tenant</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <form method="POST">

            <div class="mb-3">

                <label class="form-label">
                    Nama Tenant
                </label>

                <input
                    type="text"
                    name="nama_tenant"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="4"
                    class="form-control"
                    required></textarea>

            </div>

            <button
                type="submit"
                name="simpan"
                class="btn btn-primary">

                Simpan
            </button>

            <a href="tenant.php"
               class="btn btn-secondary">

               Kembali
            </a>

        </form>

    </div>

</div>

<?php include 'footer.php'; ?>