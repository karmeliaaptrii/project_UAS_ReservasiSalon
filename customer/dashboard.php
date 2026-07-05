<?php

require_once "../classes/Auth.php";

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: ../auth/login.php");
    exit();
}

if (!$auth->hasRole('customer')) {
    die("Akses ditolak!");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Customer</title>
</head>
<body>

    <h2>Dashboard Customer</h2>

    <p>Selamat datang, <?php echo $_SESSION['nama']; ?>!</p>

    <p>Role: <?php echo $_SESSION['role']; ?></p>

    <a href="../auth/logout.php">Logout</a>

</body>
</html>