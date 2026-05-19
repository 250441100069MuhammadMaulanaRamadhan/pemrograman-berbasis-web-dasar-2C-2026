<?php
include 'auth.php';
include 'koneksi.php';
include 'helper.php';

date_default_timezone_set('Asia/Jakarta');

$id_user = $_SESSION['user_id'];
$id_produk = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT username FROM users WHERE id=?");
$stmt->bind_param("i",$id_user);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$stmt = $conn->prepare("SELECT * FROM produk WHERE id=?");
$stmt->bind_param("i",$id_produk);
$stmt->execute();
$produk = $stmt->get_result()->fetch_assoc();

$tanggal = date("d M Y H:i");
$invoice = "TRX".date("YmdHis");
?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 p-6">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden">

        <div class="bg-green-500 text-white text-center py-6">
            <div class="text-4xl">✔</div>
            <h2 class="text-xl font-bold mt-1">Transaksi Berhasil</h2>
            <p class="text-sm opacity-90">Terima kasih atas pembelian Anda</p>
        </div>

        <div class="p-6 space-y-3 text-sm text-gray-700">

            <div class="text-center mb-4">
                <p class="text-xs text-gray-400">Invoice</p>
                <p class="font-bold tracking-wider"><?= $invoice ?></p>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">User</span>
                <span class="font-medium"><?= e($user['username']) ?></span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Produk</span>
                <span class="font-medium"><?= e($produk['nama_produk']) ?></span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-500">Tanggal</span>
                <span class="font-medium"><?= $tanggal ?></span>
            </div>

            <hr class="my-3">

            <div class="flex justify-between text-lg font-bold">
                <span>Total</span>
                <span class="text-green-600">
                    Rp <?= number_format($produk['harga']) ?>
                </span>
            </div>

        </div>

        <div class="p-4 bg-gray-50">
            <a href="tampil.php"
                class="block text-center bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 hover:scale-[1.02] transition">
                Kembali ke Dashboard
            </a>
        </div>

    </div>

</div>