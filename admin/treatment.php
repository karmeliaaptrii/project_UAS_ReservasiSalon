<?php

require_once "../classes/Auth.php";
require_once "../classes/Treatment.php";

$auth = new Auth();

if (!$auth->isLoggedIn()) {
    header("Location: ../auth/login.php");
    exit();
}

if (!$auth->hasRole("admin")) {
    die("Akses ditolak!");
}

$treatment = new Treatment();
$dataTreatment = $treatment->getAll();

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Treatment</title>
</head>

<body>

<h2>Data Treatment</h2>

<p>
    <a href="dashboard.php">Dashboard</a> |
    <a href="tambah_treatment.php">+ Tambah Treatment</a> |
    <a href="../auth/logout.php">Logout</a>
</p>

<table border="1" cellpadding="8">

    <tr>
        <th>No</th>
        <th>Nama Treatment</th>
        <th>Deskripsi</th>
        <th>Durasi</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

<?php

$no = 1;

foreach($dataTreatment as $row){

?>

<tr>

<td><?= $no++ ?></td>

<td><?= $row['nama_layanan'] ?></td>

<td><?= $row['deskripsi'] ?></td>

<td><?= $row['durasi'] ?> Menit</td>

<td>Rp <?= number_format($row['harga'],0,',','.') ?></td>

<td>

<a href="edit_treatment.php?id=<?= $row['id'] ?>">Edit</a>

|

<a href="hapus_treatment.php?id=<?= $row['id'] ?>"
onclick="return confirm('Yakin ingin menghapus treatment ini?')">

Hapus

</a>

</td>

</tr>

<?php

}

?>

</table>

</body>
</html>