<?php
include 'auth.php';
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
$stmt=$conn->prepare("INSERT INTO topup_request (user_id,jumlah) VALUES (?,?)");
$stmt->bind_param("ii",$_SESSION['user_id'],$_POST['jumlah']);
$stmt->execute();

$success = true;
}
?>

<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-500 via-indigo-500 to-purple-600 p-6">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-6">

        <h2 class="text-2xl font-bold text-center text-gray-800">
            Request Top Up
        </h2>

        <p class="text-center text-sm text-gray-500 mb-6">
            Masukkan jumlah saldo yang ingin Anda ajukan
        </p>

        <?php if(isset($success)): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-center">
                Request dikirim!
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">

            <div>
                <label class="text-sm text-gray-600">Jumlah Top Up</label>
                <input type="number" name="jumlah"
                    class="w-full mt-1 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Contoh: 50000" required>
            </div>

            <div class="bg-blue-50 text-blue-600 text-sm p-3 rounded-lg">
                Request akan diproses oleh admin terlebih dahulu!
            </div>

            <button
                class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold shadow-md hover:bg-blue-600 hover:scale-[1.02] transition">
                Kirim Request
            </button>

        </form>

        <a href="tampil.php"
            class="block text-center mt-4 text-blue-500 hover:underline text-sm">
            Kembali ke Dashboard
        </a>

    </div>

</div>