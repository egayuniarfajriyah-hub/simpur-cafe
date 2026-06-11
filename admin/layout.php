<?php
if(!isset($_SESSION['login'])){
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Simpur Cafe Reserve</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#f4f6f9;
    font-family:'Segoe UI',sans-serif;
}

.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    background:linear-gradient(180deg,#0f172a,#1e293b);
    overflow-y:auto;
}

.logo{
    padding:25px;
    text-align:center;
    border-bottom:1px solid rgba(255,255,255,0.1);
}

.logo h3{
    color:white;
    margin:0;
    font-weight:700;
}

.logo p{
    color:#cbd5e1;
    font-size:13px;
    margin-top:5px;
}

.sidebar-menu{
    padding:15px;
}

.sidebar-menu a{
    display:flex;
    align-items:center;
    gap:12px;
    text-decoration:none;
    color:#e2e8f0;
    padding:14px 16px;
    border-radius:12px;
    margin-bottom:10px;
    transition:.3s;
}

.sidebar-menu a:hover{
    background:#334155;
    color:white;
}

.sidebar-menu i{
    font-size:18px;
}

.content{
    margin-left:260px;
    min-height:100vh;
}

.topbar{
    background:white;
    padding:20px 30px;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.topbar h4{
    margin:0;
    font-weight:700;
}

.topbar p{
    margin:0;
    color:#64748b;
}

.main-content{
    padding:30px;
}

.card-dashboard{
    border:none;
    border-radius:18px;
    transition:.3s;
}

.card-dashboard:hover{
    transform:translateY(-5px);
}

.card-blue{
    background:#2563eb;
    color:white;
}

.card-green{
    background:#16a34a;
    color:white;
}

.card-orange{
    background:#ea580c;
    color:white;
}

.card-purple{
    background:#7c3aed;
    color:white;
}

.card-dashboard h1{
    font-size:42px;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">
    <h3>
        <i class="bi bi-cup-hot-fill"></i>
        Simpur Cafe
    </h3>
    <p>Cafe Reservation System</p>
</div>

<div class="sidebar-menu">

    <a href="dashboard.php">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a href="tenant.php">
        <i class="bi bi-shop"></i>
        Data Tenant
    </a>

    <a href="meja.php">
        <i class="bi bi-grid-3x3-gap-fill"></i>
        Data Meja
    </a>

    <a href="menu.php">
        <i class="bi bi-journal-text"></i>
        Data Menu
    </a>

    <a href="reservasi.php">
        <i class="bi bi-calendar-check"></i>
        Reservasi
    </a>

    <a href="laporan.php">
        <i class="bi bi-bar-chart-line"></i>
        Laporan
    </a>

    <a href="../auth/logout.php">
        <i class="bi bi-box-arrow-right"></i>
        Logout
    </a>

</div>


</div>

<div class="content">


<div class="topbar">

    <h4>Dashboard Administrator</h4>

    <p>
        Selamat datang,
        <?= $_SESSION['nama']; ?>
    </p>

</div>

<div class="main-content">

