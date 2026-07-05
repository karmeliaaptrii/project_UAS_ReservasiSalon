<?php

require_once "../classes/Auth.php";

$auth = new Auth();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($auth->login($email, $password)) {
        if ($_SESSION['role'] === 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../customer/dashboard.php");
        }

        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>

<h2>Login</h2>

<?php
if (!empty($message)) {
    echo "<p>$message</p>";
}
?>

<form method="POST">

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>

    <br>

    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>

</form>

</body>
</html>