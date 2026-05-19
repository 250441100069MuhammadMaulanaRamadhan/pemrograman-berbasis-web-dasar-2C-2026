<?php
include 'auth.php';
hanya_admin();
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
$jumlah=(int)$_POST['jumlah'];

$stmt=$conn->prepare("UPDATE users SET saldo=saldo+? WHERE id=?");
$stmt->bind_param("ii",$jumlah,$_SESSION['user_id']);
$stmt->execute();

header("Location: tampil.php?success=saldo");
exit;
}
?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <form method="POST" 
        class="bg-white w-full max-w-md p-6 rounded-2xl shadow-lg border">

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
            Tambah Saldo
        </h2>

        <p class="text-center text-sm text-gray-500 mb-5">
            Masukkan nominal saldo yang ingin ditambahkan
        </p>

        <div class="mb-4">
            <label class="text-sm text-gray-600">Jumlah Saldo</label>
            <input type="number" name="jumlah"
                class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                placeholder="Contoh: 50000" required>
        </div>

        <div class="bg-green-50 text-green-600 text-sm p-3 rounded-lg mb-4">
            Saldo akan langsung masuk ke akun setelah disimpan
        </div>

        <button
            class="w-full bg-green-500 text-white py-3 rounded-lg font-semibold shadow-md hover:bg-green-600 hover:scale-[1.02] transition">
            + Tambah Saldo
        </button>

    </form>

</div>