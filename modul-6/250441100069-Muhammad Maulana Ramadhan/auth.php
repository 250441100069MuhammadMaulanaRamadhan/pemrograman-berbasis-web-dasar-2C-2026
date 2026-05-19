<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

function hanya_admin(){
    if($_SESSION['role'] != 'admin'){
        header("Location: tampil.php");
        exit;
    }
}
?>