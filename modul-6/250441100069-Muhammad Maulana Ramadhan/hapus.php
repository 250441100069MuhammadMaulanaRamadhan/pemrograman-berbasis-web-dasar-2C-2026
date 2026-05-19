<?php
include 'auth.php';
hanya_admin();
include 'koneksi.php';

$id=(int)$_GET['id'];

$conn->query("DELETE FROM produk WHERE id=$id");

header("Location: tampil.php");