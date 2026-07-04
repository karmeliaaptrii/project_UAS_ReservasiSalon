<?php

require_once '../classes/Auth.php';

$auth = new Auth();

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $no_hp = $_POST["no_hp"];

    $result = $auth->register($nama, $email, $password, $no_hp);

    if ($result === true) {
        $message = "Registrasi berhasil! Silakan login.";   
    } else {
        $message = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi</title>
</head>

<body>
    <h2>Form Registrasi</h2>

    <?php 
    if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="no_hp">No HP:</label><br>
        <input type="text" id="no_hp" name="no_hp" required><br><br>

        <input type="submit" value="Register">
    </form>

</body>
</html>