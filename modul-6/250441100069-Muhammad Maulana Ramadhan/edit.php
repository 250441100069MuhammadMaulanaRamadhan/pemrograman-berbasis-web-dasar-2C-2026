<?php
include 'auth.php';
hanya_admin();
include 'koneksi.php';

$id=(int)$_GET['id'];

$data=$conn->query("SELECT * FROM produk WHERE id=$id")->fetch_assoc();

if($_SERVER['REQUEST_METHOD']=='POST'){
$stmt=$conn->prepare("UPDATE produk SET nama_produk=?,kategori=?,harga=?,stok=?,deskripsi=? WHERE id=?");
$stmt->bind_param("ssiisi",
$_POST['nama'],
$_POST['kategori'],
$_POST['harga'],
$_POST['stok'],
$_POST['deskripsi'],
$id
);
$stmt->execute();

header("Location: tampil.php");
exit;
}
?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">

    <form method="POST"
        class="bg-white w-full max-w-lg p-6 rounded-2xl shadow-lg border">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-5">
            Edit Produk
        </h2>

        <input name="nama" value="<?= $data['nama_produk'] ?>"
            class="w-full mb-3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Nama Produk">

        <input name="kategori" value="<?= $data['kategori'] ?>"
            class="w-full mb-3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Kategori">

        <input name="harga" value="<?= $data['harga'] ?>"
            class="w-full mb-3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Harga">

        <input name="stok" value="<?= $data['stok'] ?>"
            class="w-full mb-3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Stok">

        <textarea name="deskripsi" rows="4"
            class="w-full mb-4 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Deskripsi Produk"><?= $data['deskripsi'] ?></textarea>

        <button
            class="w-full bg-yellow-500 text-white py-3 rounded-lg font-semibold shadow-md hover:bg-yellow-600 hover:scale-[1.02] transition">
            Update Produk
        </button>

        <a href="tampil.php"
            class="block text-center mt-3 text-blue-500 hover:underline text-sm">
            Kembali
        </a>

    </form>

</div>