<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

if(isset($_POST['simpan'])){

    $nomor = $_POST['nomor_meja'];
    $kapasitas = $_POST['kapasitas'];
    $status = $_POST['status'];

    mysqli_query(
        $koneksi,
        "INSERT INTO meja
        (nomor_meja,kapasitas,status)
        VALUES
        ('$nomor','$kapasitas','$status')"
    );

    echo "
    <script>
        alert('Meja berhasil ditambahkan');
        document.location='meja.php';
    </script>
    ";
}

include 'layout.php';
?>

<h2 class="mb-4">Tambah Meja</h2>

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST">

            <div class="mb-3">
                <label>Nomor Meja</label>
                <input type="text"
                       name="nomor_meja"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Kapasitas</label>
                <input type="number"
                       name="kapasitas"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status"
                        class="form-select">

                    <option value="Tersedia">
                        Tersedia
                    </option>

                    <option value="Terisi">
                        Terisi
                    </option>

                </select>
            </div>

            <button type="submit"
                    name="simpan"
                    class="btn btn-primary">

                Simpan

            </button>

            <a href="meja.php"
               class="btn btn-secondary">

               Kembali

            </a>

        </form>

    </div>
</div>

<?php include 'footer.php'; ?>