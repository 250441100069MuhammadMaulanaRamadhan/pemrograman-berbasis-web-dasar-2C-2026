<?php
include 'auth.php';
hanya_admin();
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
$stmt=$conn->prepare("INSERT INTO produk (nama_produk,kategori,harga,stok,deskripsi) VALUES (?,?,?,?,?)");
$stmt->bind_param("ssiis",
$_POST['nama'],
$_POST['kategori'],
$_POST['harga'],
$_POST['stok'],
$_POST['deskripsi']
);
$stmt->execute();

header("Location: tampil.php?success=produk");
exit;
}
?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <form method="POST" 
        class="bg-white w-full max-w-lg p-6 rounded-2xl shadow-lg border">

        <h2 class="text-2xl font-bold text-gray-800 mb-5 text-center">
            Tambah Produk
        </h2>

        <input name="nama"
            class="w-full mb-3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Nama Produk" required>

        <input name="kategori"
            class="w-full mb-3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Kategori" required>

        <input type="number" name="harga"
            class="w-full mb-3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Harga" required>

        <input type="number" name="stok"
            class="w-full mb-3 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Stok" required>

        <textarea name="deskripsi" rows="4"
            class="w-full mb-4 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            placeholder="Deskripsi produk"></textarea>

        <button
            class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold shadow-md hover:bg-blue-600 hover:scale-[1.02] transition">
            Simpan Produk
        </button>

    </form>

</div>