<?php
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT'] . '/RPL4_Indomaret');
include '../../includes/header.php';
include '../../config/config.php';

$result = mysqli_query($conn, "SELECT * FROM tabel_kasir ORDER BY id_kasir ASC");
?>

<main class="max-w-4xl mx-auto mt-10 px-4 pb-16">

    <!-- Header -->
    <div class="flex items-center justify-between mb-5">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Kasir</h1>
        <a href="add.php" class="bg-gray-900 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
            + Tambah
        </a>
    </div>

    <!-- Tabel -->
    <div class="bg-white shadow rounded-xl overflow-hidden border border-gray-100">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-900 text-white">
                <tr>
                    <th class="px-4 py-3 w-12">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Telepon</th>
                    <th class="px-4 py-3">Alamat</th>
                    <th class="px-4 py-3 w-36 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-500"><?= $no++ ?></td>
                            <td class="px-4 py-3 font-medium text-gray-800"><?= htmlspecialchars($row['nama_kasir']) ?></td>
                            <td class="px-4 py-3 text-gray-600"><?= htmlspecialchars($row['no_telp']) ?></td>
                            <td class="px-4 py-3 text-gray-600"><?= htmlspecialchars($row['alamat']) ?></td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="edit.php?id=<?= $row['id_kasir'] ?>"
                                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-md text-xs">
                                        Edit
                                    </a>
                                    <form action="../../process/cashier_process.php" method="post"
                                          onsubmit="return confirm('Hapus kasir ini?')">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id_kasir" value="<?= $row['id_kasir'] ?>">
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="px-4 py-10 text-center text-gray-400">
                            Belum ada data kasir
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</main>