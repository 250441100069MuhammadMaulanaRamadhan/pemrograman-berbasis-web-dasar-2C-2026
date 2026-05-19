<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s",$_POST['username']);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if($user && password_verify($_POST['password'],$user['password'])){
        session_regenerate_id(true);
        $_SESSION['user_id']=$user['id'];
        $_SESSION['role']=$user['role'];

        header("Location: tampil.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gradient-to-br from-black via-gray-900 to-indigo-900 h-screen flex items-center justify-center">

<div class="grid md:grid-cols-2 bg-white rounded-2xl shadow-2xl overflow-hidden w-[800px]">

<div class="bg-gradient-to-br from-indigo-600 to-purple-700 text-white p-8 flex flex-col justify-center items-center">

    <h1 class="text-3xl font-bold mb-2">SAMURAI STORE</h1>
    <p class="text-sm text-center mb-4">TOP UP ALL PULSA & ALL GAMES</p>

    <div class="text-6xl animate-bounce">🎮</div>

    <p class="mt-4 text-center text-sm opacity-80">
        SELAMAT DATANG DI WEBSITE TOP UP TERPECAYA!<br>
        CEPAT & AMAN
    </p>

</div>

<div class="p-8">

<h2 class="text-2xl font-bold text-center mb-1">Welcome !</h2>
<p class="text-center text-gray-500 mb-4">Login ke akun kamu</p>

<?php if(isset($error)): ?>
<div class="bg-red-100 text-red-600 p-2 rounded mb-3 text-sm text-center">
<?= $error ?>
</div>
<?php endif; ?>

<form method="POST">

<input name="username" 
class="border p-3 w-full mb-3 rounded-lg focus:ring-2 focus:ring-indigo-500" 
placeholder="Username" required>

<input type="password" name="password" 
class="border p-3 w-full mb-4 rounded-lg focus:ring-2 focus:ring-indigo-500" 
placeholder="Password" required>

<button name="login" 
class="bg-indigo-600 hover:bg-indigo-700 text-white w-full p-3 rounded-lg transition duration-300 shadow-lg">
Login
</button>

</form>

<p class="text-center text-sm mt-4">
Belum punya akun? 
<a href="register.php" class="text-indigo-600 font-semibold">Register</a>
</p>

</div>

</div>

</body>