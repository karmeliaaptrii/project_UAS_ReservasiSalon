<?php

require_once "../classes/Auth.php";
require_once "../classes/Treatment.php";

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: ../auth/login.php");
    exit();
}

if (!$auth->hasRole('admin')) {
    die("Akses ditolak!");
}

$treatment = new Treatment();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama_treatment'];
    $deskripsi = $_POST['deskripsi'];
    $durasi = $_POST['durasi'];
    $harga = $_POST['harga'];

    if ($treatment->create($nama, $deskripsi, $durasi, $harga)) {

        header("Location: treatment.php");
        exit();

    } else {

        $message = "Gagal menambahkan treatment.";

    }

}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Treatment</title>
</head>

<body>

<h2>Tambah Treatment</h2>

<?php
if (!empty($message)) {
    echo "<p style='color:red;'>$message</p>";
}
?>

<form method="POST">

    <label>Nama Treatment</label><br>
    <input type="text" name="nama_treatment" required><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" rows="4"></textarea><br><br>

    <label>Durasi (Menit)</label><br>
    <input type="number" name="durasi" required><br><br>

    <label>Harga</label><br>
    <input type="number" name="harga" required><br><br>

    <button type="submit">Simpan</button>

</form>

<br>

<a href="treatment.php">← Kembali ke Data Treatment</a>

</body>
</html>