<?php
include 'konfig.php';
session_start();
if(isset($_POST["login"])) 
{
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $ambil = $koneksi->query("SELECT * FROM user WHERE email='$email' AND pass='$pass'");
    $akunyangcock = $ambil->num_rows;
    if($akunyangcock==1) {
        $akun = $ambil -> fetch_assoc();
        $_SESSION["user"] = $akun;
        echo "<script> alert('Anda Berhasil Login.');</script>";
        if(isset($_SESSION["keranjang "]) OR !empty($_SESSION["keranjang "])) 
        {
            echo "<script>location='riwayat.php';</script>";
        }
        else
        {
            echo "<script>location='menu.php';</script>";
        }
    }
    else
    {
        echo "<script> alert('Anda Gagal Login, Periksa Akun Anda.');</script>";
        echo "<script>location='masuk.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Masuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="masuk.css">
    <link rel="stylesheet" href="css/bootstrap.min">
</head>
<body>
    <div class="row backgroundimg">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.html"><img src="./LOGO UIM.png" alt="" /></a>               
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
                        <div class="login-box">
                            <h1>Masuk</h1>
                            <div class="textbox">
                                <i class="fas fa-envelope"></i>
                                <input type="text" placeholder="Email" name="email">
                            </div>

                            <div class="textbox">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Password" name="pass">
                            </div>
                            <input type="submit" name="login" class="btn-masuk" value="Masuk">
                            <a href="./daftar.php"><input type="button" class="btn-masuk" value="Daftar Akun"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>

<?php





?>
    
