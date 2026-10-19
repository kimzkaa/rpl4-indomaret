<?php
// Mendefinisikan ROOTPATH sebagai path ke direktori root proyek
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT'] . 'rpl4-indomaret');
include '../../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../pages/cashier/list.php");
    exit;
}

include "../config/config.php";

$action = $_POST['action'] ?? '';

// ============ ADD ============
if ($action === 'add') {
    $nama   = $_POST['nama_kasir'];
    $telp   = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $stmt = mysqli_prepare($conn, "INSERT INTO tabel_kasir (nama_kasir, no_telp, alamat) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $nama, $telp, $alamat);
    mysqli_stmt_execute($stmt);
}

// ============ DELETE ============
elseif ($action === 'delete') {
    $id = $_POST['id'] ?? 0;

    $stmt = mysqli_prepare($conn, "DELETE FROM tabel_kasir WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

header("Location: ../pages/cashier/list.php");
exit;
?>


