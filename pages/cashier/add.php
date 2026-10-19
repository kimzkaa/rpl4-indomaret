<?php
// Mendefinisikan ROOTPATH sebagai path ke direktori root proyek
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT'] . '/RPL4_Indomaret');
include '../../includes/header.php';
?>
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<center style="margin-top: 50px;">
    <h1 class="text-3xl pb-[10px]">Tambah Data Kasir</h1>
    <form action="../../process/cashier_process.php" method="post">
        <div class="input-group flex flex-col gap-4 w-[400px] bg-white shadow-md mb-2">
            <input type="hidden" name="action" value="add"> 
            <input type="text" name="nama_kasir" id="username" class="custom-input flex p-2 w-100 border-1 rounded-xl" placeholder="Masukkan nama Kasir..."
                required>
            <input type="text" name="no_telp" id="no_telp" class="custom-input flex p-2 w-100 border-1 rounded-xl"
                placeholder="Masukkan nomor telepon Kasir..." required>
            <input type="text" name="alamat" id="alamat" class="custom-input flex p-2 w-100 border-1 rounded-xl" placeholder="Masukkan alamat Kasir..."
                required>
        </div>
        <button type="submit" class="btn btn-primary border-1 rounded-full bg-gray-900 text-white p-2">Tambah Kasir</button>
    </form>
</center>