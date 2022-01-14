<?php
include 'konfig.php';
session_start();
$id_menu = $_GET["id"];
if(isset($_SESSION['keranjang'][$id_menu]))
{
    $_SESSION['keranjang'][$id_menu]+=1;
} else
{
    $_SESSION['keranjang'][$id_menu]=1;
}
echo "<script>alert('Menu Telah Masuk Keranjang Belanja');</script>";
echo "<script>location='menu.php';</script>";
?>
