<?php
include '../config/koneksi.php';

if(isset($_POST['register'])){

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM users
        WHERE email='$email'"
    );

    if(mysqli_num_rows($cek) > 0){

        $error = "Email sudah digunakan";

    }else{

        mysqli_query(
            $koneksi,
            "INSERT INTO users
            (nama,email,password,role)
            VALUES
            ('$nama','$email','$password','pelanggan')"
        );

        echo "
        <script>
        alert('Registrasi berhasil');
        document.location='login.php';
        </script>
        ";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Registrasi Simpur Cafe</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    min-height:100vh;
    background:#f1f5f9;
    display:flex;
    align-items:center;
}

.register-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
}

.left-side{
    background:linear-gradient(135deg,#2563eb,#1e40af);
    color:white;
    min-height:600px;
    padding:50px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.right-side{
    padding:50px;
}

.logo{
    font-size:60px;
}

.btn-register{
    background:#2563eb;
    border:none;
    padding:12px;
}

.btn-register:hover{
    background:#1d4ed8;
}

</style>

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-lg-10">

<div class="card register-card shadow-lg">

<div class="row g-0">

<div class="col-md-5">

<div class="left-side">

<div class="logo">
☕
</div>

<h2 class="fw-bold mt-3">
Simpur Cafe Reserve
</h2>

<p class="mt-3">

Daftar sebagai pelanggan dan nikmati
kemudahan reservasi meja secara online.

</p>

</div>

</div>

<div class="col-md-7">

<div class="right-side">

<h2 class="fw-bold mb-2">

Registrasi Pelanggan

</h2>

<p class="text-muted mb-4">

Buat akun baru untuk mulai melakukan reservasi.

</p>

<?php if(isset($error)): ?>

<div class="alert alert-danger">

<?= $error; ?>

</div>

<?php endif; ?>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Nama Lengkap
</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Email
</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-4">

<label class="form-label">
Password
</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>
<button
type="submit"
name="register"
class="btn btn-register btn-primary w-100">

Daftar Sekarang

</button>

</form>

<div class="text-center mt-4">

<p class="text-muted mb-2">

Sudah punya akun?

</p>

<a href="login.php"
class="btn btn-outline-primary">

Login

</a>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>