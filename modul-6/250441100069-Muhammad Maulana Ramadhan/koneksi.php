<?php
$conn = new mysqli("localhost","root","","db_topup");

if($conn->connect_error){
    die("Koneksi gagal");
}
?>