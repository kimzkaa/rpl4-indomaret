<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../pages/cashier/list.php");
    exit;
}

include "../config/config.php";

$action = $_POST['action'] ?? '';

if ($action === 'add') {
    $nama   = $_POST['nama_kasir'];
    $telp   = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    // pakai prepared statement biar aman dari SQL injection
    $stmt = mysqli_prepare($conn, "INSERT INTO tabel_kasir (nama_kasir, no_telp, alamat) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $nama, $telp, $alamat);
    $ok = mysqli_stmt_execute($stmt);

    if (!$ok) {
        die("Gagal insert: " . mysqli_error($conn)); // sementara buat debug
    }
}

header("Location: ../pages/cashier/list.php");
exit;