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
    "SELECT * FROM menu
    WHERE id_menu='$id'"
);

$menu = mysqli_fetch_assoc($data);

$tenant = mysqli_query(
    $koneksi,
    "SELECT * FROM tenant"
);

if(isset($_POST['update'])){

    $id_tenant = $_POST['id_tenant'];
    $nama_menu = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query(
        $koneksi,
        "UPDATE menu SET
        id_tenant='$id_tenant',
        nama_menu='$nama_menu',
        harga='$harga',
        deskripsi='$deskripsi'
        WHERE id_menu='$id'"
    );

    echo "
    <script>
        alert('Menu berhasil diupdate');
        document.location='menu.php';
    </script>
    ";
}

include 'layout.php';
?>

<h2 class="mb-4">Edit Menu</h2>

<div class="card shadow-sm">
<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Tenant</label>

<select name="id_tenant"
        class="form-select">

<?php while($t=mysqli_fetch_assoc($tenant)): ?>

<option value="<?= $t['id_tenant']; ?>"
<?= $menu['id_tenant']==$t['id_tenant'] ? 'selected' : ''; ?>>

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
       value="<?= $menu['nama_menu']; ?>"
       required>

</div>

<div class="mb-3">
<label>Harga</label>

<input type="number"
       name="harga"
       class="form-control"
       value="<?= $menu['harga']; ?>"
       required>

</div>

<div class="mb-3">
<label>Deskripsi</label>

<textarea name="deskripsi"
          class="form-control"
          rows="4"><?= $menu['deskripsi']; ?></textarea>

</div>

<button type="submit"
        name="update"
        class="btn btn-primary">

Update

</button>

<a href="menu.php"
   class="btn btn-secondary">

Kembali

</a>

</form>

</div>
</div>

<?php include 'footer.php'; ?>