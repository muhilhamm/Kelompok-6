<?php

session_start();

$id_menu = $_GET['id'];

if(isset($_SESSION['keranjang'][$id_menu]))
{
    $_SESSION['keranjang'][$id_menu]+=1;
}
else{
    $_SESSION['keranjang'][$id_menu]=1;
}

    echo "<script>alert('Menu telah masuk ke keranjang belanja');</script>";
    echo "<script>alert(location='keranjang.php';</script>";

?>