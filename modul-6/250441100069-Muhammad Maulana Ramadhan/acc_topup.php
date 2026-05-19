<?php
include 'auth.php';
hanya_admin();
include 'koneksi.php';

$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM topup_request WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if(!$data){
    die("Data tidak ditemukan");
}

$stmt = $conn->prepare("UPDATE users SET saldo = saldo + ? WHERE id=?");
$stmt->bind_param("ii",$data['jumlah'],$data['user_id']);
$stmt->execute();

$stmt = $conn->prepare("UPDATE topup_request SET status='approved' WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();

header("Location: lihat_request.php");
exit;