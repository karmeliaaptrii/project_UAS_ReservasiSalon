<?php

require_once "../classes/Auth.php";

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: ../auth/login.php");
    exit();
}

if (!$auth->hasRole('admin')) {
    die("Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.");
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>

<body>

<h2>Dashboard Admin</h2>

<p>Selamat datang, <b><?php echo $_SESSION['nama']; ?></b>!</p>

<p>Role: <?php echo $_SESSION['role']; ?></p>

<hr>

<h3>Menu Admin</h3>

<ul>
    <li><a href="treatment.php">Kelola Treatment</a></li>
    <li><a href="reservasi.php">Data Reservasi</a></li>
    <li><a href="customer.php">Data Customer</a></li>
</ul>

<hr>

<a href="../auth/logout.php">Logout</a>

</body>
</html>