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
<html>
<head>

    <title>Dashboard Admin</title>

</head>
<body>

    <h2>Dashboard Admin</h2>

    <p>Selamat datang, <?php echo $_SESSION['nama']; ?>!</p>

    <p>Role: <?php echo $_SESSION['role']; ?></p>

    <a href="../auth/logout.php">Logout</a>
    
</body>
</html>