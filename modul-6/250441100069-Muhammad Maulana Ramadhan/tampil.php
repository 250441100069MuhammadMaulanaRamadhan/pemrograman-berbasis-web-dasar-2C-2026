<?php 
include 'auth.php'; 
include 'koneksi.php'; 
include 'helper.php'; 
?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gray-100 p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
        <a href="logout.php" class="text-white bg-red-500 px-4 py-2 rounded-lg shadow hover:bg-red-600 transition">
            Logout
        </a>
    </div>

    <?php if(isset($_GET['success'])): ?>
        <div class="bg-green-100 text-green-700 p-3 mb-4 rounded-lg shadow">
            Berhasil!
        </div>
    <?php endif; ?>

    <?php
    $user = $conn->query("SELECT saldo FROM users WHERE id=".$_SESSION['user_id'])->fetch_assoc();
    ?>

    <div class="bg-white shadow-md rounded-xl p-5 mb-5 border-l-4 border-blue-500">
        <p class="text-gray-500">Saldo Anda</p>
        <h1 class="text-2xl font-bold text-blue-600">
            Rp <?= number_format($user['saldo']) ?>
        </h1>
    </div>

    <div class="flex flex-wrap gap-3 mb-6">

        <?php if($_SESSION['role']=='admin'): ?>
            <a href="tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:scale-105 transition">
                + Produk
            </a>
            <a href="tambah_saldo.php" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:scale-105 transition">
                + Saldo
            </a>
            <a href="lihat_request.php" class="bg-purple-500 text-white px-4 py-2 rounded-lg shadow hover:scale-105 transition">
                Request
            </a>
        <?php else: ?>
            <a href="request_topup.php" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow hover:scale-105 transition">
                Top Up
            </a>
        <?php endif; ?>

    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="w-full text-sm">

            <thead class="bg-gray-200 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Kategori</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Stok</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php $data=$conn->query("SELECT * FROM produk"); ?>
            <?php while($row=$data->fetch_assoc()): ?>

                <tr class="border-b hover:bg-gray-50 transition text-center">
                    <td class="p-3"><?= e($row['nama_produk']) ?></td>
                    <td class="p-3"><?= e($row['kategori']) ?></td>
                    <td class="p-3 font-semibold text-green-600">
                        Rp <?= number_format($row['harga']) ?>
                    </td>
                    <td class="p-3"><?= e($row['stok']) ?></td>

                    <td class="p-3 flex justify-center gap-2">

                        <a href="beli.php?id=<?= $row['id'] ?>" 
                           class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600 transition">
                            Beli
                        </a>

                        <?php if($_SESSION['role']=='admin'): ?>
                            <a href="edit.php?id=<?= $row['id'] ?>" 
                               class="bg-yellow-400 px-3 py-1 rounded-md hover:bg-yellow-500 transition">
                                Edit
                            </a>

                            <a href="hapus.php?id=<?= $row['id'] ?>" 
                               class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">
                                Hapus
                            </a>
                        <?php endif; ?>

                    </td>
                </tr>

            <?php endwhile; ?>

            </tbody>
        </table>
    </div>

</div>