<?php

require_once "classes/Auth.php";

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: auth/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

<h2>Selamat Datang</h2>

<p>Halo, <?php echo $_SESSION['nama']; ?></p>

<p>Role: <?php echo $_SESSION['role']; ?></p>

<a href="auth/logout.php">Logout</a>

</body>
</html>