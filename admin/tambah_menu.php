<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

if(isset($_POST['simpan'])){

    $id_tenant = $_POST['id_tenant'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query(
        $koneksi,
        "INSERT INTO menu
        (id_tenant,nama_menu,harga,deskripsi)
        VALUES
        ('$id_tenant','$nama_menu','$harga','$deskripsi')"
    );

    echo "
    <script>
        alert('Menu berhasil ditambahkan');
        document.location='menu.php';
    </script>
    ";
}

$tenant = mysqli_query($koneksi,"SELECT * FROM tenant");

include 'layout.php';
?>

<h2 class="mb-4">Tambah Menu</h2>

<div class="card shadow-sm">
<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Tenant</label>

<select name="id_tenant" class="form-select" required>

<?php while($t=mysqli_fetch_assoc($tenant)): ?>

<option value="<?= $t['id_tenant']; ?>">
    <?= $t['nama_tenant']; ?>
</option>

<?php endwhile; ?>

</select>
</div>

<div class="mb-3">
<label>Nama Menu</label>
<input type="text"
       name="nama_menu"
       class="form-control"
       required>
</div>

<div class="mb-3">
<label>Harga</label>
<input type="number"
       name="harga"
       class="form-control"
       required>
</div>

<div class="mb-3">
<label>Deskripsi</label>
<textarea name="deskripsi"
          class="form-control"
          rows="4"></textarea>
</div>

<button type="submit"
        name="simpan"
        class="btn btn-primary">

Simpan

</button>

<a href="menu.php"
   class="btn btn-secondary">

Kembali

</a>

</form>

</div>
</div>

<?php include 'footer.php'; ?>