<?php
session_start();
include '../config/koneksi.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM users
        WHERE email='$email'
        AND password='$password'"
    );

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];

        if($data['role']=='admin'){

            header("Location: ../admin/dashboard.php");
            exit;

        }
        elseif($data['role']=='pelanggan'){

            header("Location: ../pelanggan/dashboard.php");
            exit;

        }
        elseif($data['role']=='tenant'){

            header("Location: ../tenant/dashboard.php");
            exit;

        }

    }else{

        $error = "Email atau Password salah!";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login Simpur Cafe</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    min-height:100vh;
    background:#f1f5f9;
    display:flex;
    align-items:center;
}

.login-card{
    border:none;
    border-radius:25px;
    overflow:hidden;
}

.left-side{
    background:url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1200');
    background-size:cover;
    background-position:center;
    min-height:550px;
}

.right-side{
    padding:50px;
}

.logo{
    font-size:50px;
}

.btn-login{
    background:#2563eb;
    border:none;
    padding:12px;
}

.btn-login:hover{
    background:#1d4ed8;
}

</style>

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-lg-10">

<div class="card login-card shadow-lg">

<div class="row g-0">

<div class="col-md-6 left-side d-none d-md-block">

</div>

<div class="col-md-6">

<div class="right-side">

<div class="text-center mb-4">

<div class="logo">
☕
</div>

<h2 class="fw-bold">
Login Simpur Cafe
</h2>

<p class="text-muted">
Masuk ke sistem reservasi cafe
</p>

</div>

<?php if(isset($error)): ?>

<div class="alert alert-danger">

<?= $error; ?>

</div>

<?php endif; ?>

<form method="POST">

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
name="login"
class="btn btn-login btn-primary w-100">

Login

</button>

</form>

<div class="text-center mt-4">

<div class="text-center mt-4">

<p class="text-muted mb-2">

Belum punya akun?

</p>

<a href="register.php"
class="btn btn-outline-primary me-2">

Daftar Sekarang

</a>

<a href="../index.php"
class="btn btn-outline-secondary">

Kembali ke Beranda

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