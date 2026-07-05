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

if (!isset($_GET['id'])) {
    header("Location: treatment.php");
    exit();
}

$id = $_GET['id'];

$data = $treatment->getById($id);

if (!$data) {
    die("Data treatment tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama_layanan'];
    $deskripsi = $_POST['deskripsi'];
    $durasi = $_POST['durasi'];
    $harga = $_POST['harga'];

    if ($treatment->update($id, $nama, $deskripsi, $durasi, $harga)) {

        header("Location: treatment.php");
        exit();

    } else {

        echo "Gagal mengupdate data.";

    }

}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Treatment</title>
</head>
<body>

<h2>Edit Treatment</h2>

<form method="POST">

    <label>Nama Layanan</label><br>
    <input type="text" name="nama_layanan"
        value="<?= $data['nama_layanan']; ?>" required><br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi" rows="4"><?= $data['deskripsi']; ?></textarea><br><br>

    <label>Durasi (Menit)</label><br>
    <input type="number" name="durasi"
        value="<?= $data['durasi']; ?>" required><br><br>

    <label>Harga</label><br>
    <input type="number" name="harga"
        value="<?= $data['harga']; ?>" required><br><br>

    <button type="submit">Update</button>

</form>

<br>

<a href="treatment.php">← Kembali ke Data Treatment</a>

</body>
</html>