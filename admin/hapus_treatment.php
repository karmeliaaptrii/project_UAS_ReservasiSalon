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

if (!isset($_GET['id'])) {
    header("Location: treatment.php");
    exit();
}

$treatment = new Treatment();

$id = $_GET['id'];

if ($treatment->delete($id)) {

    header("Location: treatment.php");
    exit();

} else {

    echo "Gagal menghapus treatment.";

}