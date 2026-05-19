<?php
include 'koneksi.php';

if(isset($_POST['daftar'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $saldo = ($role=='admin') ? 500000 : 200000;

    $stmt=$conn->prepare("INSERT INTO users (username,password,role,saldo) VALUES (?,?,?,?)");
    
    if($stmt){
        $stmt->bind_param("sssi",$username,$password,$role,$saldo);
        if($stmt->execute()){
            header("Location: login.php");
            exit;
        } else {
            $error = "Gagal daftar (username mungkin sudah dipakai)";
        }
    } else {
        $error = "Query error!";
    }
}
?>

<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gradient-to-br from-black via-gray-900 to-indigo-900 h-screen flex items-center justify-center">

<div class="grid md:grid-cols-2 bg-white rounded-2xl shadow-2xl overflow-hidden w-[850px]">

<div class="bg-gradient-to-br from-green-500 to-blue-600 text-white p-8 flex flex-col justify-center items-center">

    <h1 class="text-3xl font-bold mb-2">SAMURAI STORE</h1>
    <p class="text-sm text-center mb-4">TOP UP ALL PULSA & ALL GAMES</p>

    <div class="text-6xl animate-pulse">💎</div>

    <p class="mt-4 text-center text-sm opacity-80">
        BUAT AKUN SEKARANG <br>
        NIKMATI LAYANAN TOP UP CEPAT & AMAN
    </p>

</div>

<div class="p-8">

<h2 class="text-2xl font-bold text-center mb-1">Create Account</h2>
<p class="text-center text-gray-500 mb-4">Daftar untuk mulai top up</p>

<?php if(isset($error)): ?>
<div class="bg-red-100 text-red-600 p-2 rounded mb-3 text-sm text-center">
<?= $error ?>
</div>
<?php endif; ?>

<form method="POST">

<input name="username" 
class="border p-3 w-full mb-3 rounded-lg focus:ring-2 focus:ring-green-500" 
placeholder="Username" required>

<input type="password" name="password" 
class="border p-3 w-full mb-3 rounded-lg focus:ring-2 focus:ring-green-500" 
placeholder="Password" required>

<select name="role" 
class="border p-3 w-full mb-4 rounded-lg focus:ring-2 focus:ring-green-500">
<option value="user">User</option>
<option value="admin">Admin</option>
</select>

<button name="daftar" 
class="bg-green-500 hover:bg-green-600 text-white w-full p-3 rounded-lg transition duration-300 shadow-lg">
Daftar Sekarang
</button>

</form>

<p class="text-center text-sm mt-4">
Sudah punya akun? 
<a href="login.php" class="text-green-600 font-semibold">Login</a>
</p>

</div>

</div>

</body>