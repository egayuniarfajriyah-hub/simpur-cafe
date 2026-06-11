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
    "SELECT * FROM meja
    WHERE id_meja='$id'"
);

$meja = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nomor = $_POST['nomor_meja'];
    $kapasitas = $_POST['kapasitas'];
    $status = $_POST['status'];

    mysqli_query(
        $koneksi,
        "UPDATE meja SET
        nomor_meja='$nomor',
        kapasitas='$kapasitas',
        status='$status'
        WHERE id_meja='$id'"
    );

    echo "
    <script>
        alert('Data berhasil diupdate');
        document.location='meja.php';
    </script>
    ";
}

include 'layout.php';
?>

<h2 class="mb-4">Edit Meja</h2>

<div class="card shadow-sm">
    <div class="card-body">

        <form method="POST">

            <div class="mb-3">
                <label>Nomor Meja</label>

                <input type="text"
                       name="nomor_meja"
                       class="form-control"
                       value="<?= $meja['nomor_meja']; ?>"
                       required>
            </div>

            <div class="mb-3">
                <label>Kapasitas</label>

                <input type="number"
                       name="kapasitas"
                       class="form-control"
                       value="<?= $meja['kapasitas']; ?>"
                       required>
            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status"
                        class="form-select">

                    <option value="Tersedia"
                    <?= $meja['status']=='Tersedia' ? 'selected' : ''; ?>>
                        Tersedia
                    </option>

                    <option value="Terisi"
                    <?= $meja['status']=='Terisi' ? 'selected' : ''; ?>>
                        Terisi
                    </option>

                </select>

            </div>

            <button type="submit"
                    name="update"
                    class="btn btn-primary">

                Update

            </button>

            <a href="meja.php"
               class="btn btn-secondary">

               Kembali

            </a>

        </form>

    </div>
</div>

<?php include 'footer.php'; ?>