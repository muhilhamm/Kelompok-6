<?php
include 'konfig.php';
if (isset($_POST["daftar"])) {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $kontak = $_POST["kontak"];
    if(empty($nama) || empty($email) || empty($pass) || empty($kontak) ) {
        ?>
        <script>
            alert("Sila Isikan Data!");
        </script>
        <?php
    } else {
        $sql = mysqli_query($koneksi,"INSERT INTO `user` (`nama`, `email`, `pass`, `kontak`) VALUES ('$nama', '$email', '$pass', '$kontak')");
        echo "<script>alert('Akun berhasil didaftar');</script>";
        echo "<script>location='masuk.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="daftar.css">
    <link rel="stylesheet" href="css/bootstrap.min">
    <style>
        label textarea{
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="row backgroundimg">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="./LOGO UIM.png" alt=""  style="height: 40px; float: left; margin-top: 20px;"/></a>               
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="navbar-utama">
                            <li><a href="index.php"><i class="fas fa-home"></i> Beranda</a></li>
                            <li><a href=""><i class="fas fa-utensils"></i> Menu</a></li>
                            <li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
                            <?php if(isset($_SESSION["user"])) :  ?>
                            <li><a href="keluar.php"><i class="fa fa-lock"></i> Keluar</a></li>
                            <?php else:   ?>
                            <li><a href="masuk.php"><i class="fa fa-lock"></i> Masuk</a></li>
                            <?php endif  ?>
                            <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="box" action="" method="POST">
                        <div class="daftar-box">
                            <h1>Daftar</h1>
                            <div class="textbox">
                                <i class="fas fa-users"></i>
                                <input type="text" placeholder="Nama" name="nama" value="">
                            </div>
                            <div class="textbox">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Email" name="email" value="">
                            </div>
                            <div class="textbox">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Password" name="pass" value="">
                            </div>
                            <div class="textbox">
                            <i class="fas fa-phone"></i>
                                <input type="text" placeholder="Kontak/No. HP" name="kontak" value="">
                            </div>
                            <input type="submit" name="daftar" class="btn-daftar" value="Daftar">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>