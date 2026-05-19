<?php
include 'auth.php';
include 'koneksi.php';

$id_user = $_SESSION['user_id'];
$id_produk = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT saldo FROM users WHERE id=?");
$stmt->bind_param("i",$id_user);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

$stmt = $conn->prepare("SELECT * FROM produk WHERE id=?");
$stmt->bind_param("i",$id_produk);
$stmt->execute();
$produk = $stmt->get_result()->fetch_assoc();

if(!$produk){
    die("Produk tidak ditemukan");
}

if($produk['stok'] <= 0){
    die("Stok habis");
}

if($user['saldo'] < $produk['harga']){
    die("Saldo tidak cukup");
}

$stmt = $conn->prepare("UPDATE users SET saldo = saldo - ? WHERE id=?");
$stmt->bind_param("ii",$produk['harga'],$id_user);
$stmt->execute();

$stmt = $conn->prepare("UPDATE produk SET stok = stok - 1 WHERE id=?");
$stmt->bind_param("i",$id_produk);
$stmt->execute();

header("Location: struk.php?id=".$id_produk);
exit;