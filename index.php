<?php
session_start();
include 'konfig.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HOME COOKING MAKASSAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="short icon" type="image/png" href="LOGO UIM.png">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
    <header>
        <div class="baris">
            <div class="col-sm-3">
                <div class="LOGO-UIM">
                    <img src="LOGO UIM.png" width="100px">
                </div>
            </div>
            <div class="col-sm-9">
                <div class="shop-menu pull-right">
                    <ul class="nav-utama" id="nav-utama">
                        <li><a href="index.php"><i class="fas fa-home"></i> Beranda</a></li>
                        <li><a href="menu.php"><i class="fas fa-utensils"></i> Menu</a></li>
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
    </header>
    <section>
        <div class="container">
            <div class="row">
                <div class="hero">
                    
                        <h2>WELCOME TO HOME COOKING MAKASSAR</h2> 
                        <div class="button">
                            <?php if(isset($_SESSION["user"])) :  ?>
                            <a href="menu.php" class="btn btn-half">ORDER SEKARANG</a>
                            <?php else:   ?>
                            <a href="menu.php" class="btn btn-half">ORDER SEKARANG</a>
                            <a href="daftar.php" class="btn btn-full">ANDA LAPAR!</a>
                            <?php endif  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="features">
        <h3 class="text-center">HOME COOKING MAKASSAR</h3>
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-sm-offset-3 text-center">
                    <span style="font-size: 90px;"><i class="far fa-check-circle"></i></span>
                </div>
                <div class="col-sm-4">
                    <h2 class="rumah">Restoran Pilihan</h2>
                    <p>Jelajahi dunia gastronomi melalui beragam restoran pilihan berkualitas dari kami
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-sm-offset-3 text-center">
                    <span style="font-size: 90px"><i class="fas fa-stopwatch"></i></span>
                </div>
                <div class="col-sm-4">
                    <h2 class="rumah">Diantar dengan Cepat</h2>
                    <p>Tidak perlu khawatir kelaparan karena makanan kami antar dengan cepat
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-sm-offset-3 text-center">
                    <span style="font-size: 90px"><i class="fas fa-users"></i></span>
                </div>
                <div class="col-sm-4">
                    <h2 class="rumah">Layanan Terpercaya</h2>
                    <p>Kualitas makanan yang diantar tetap terjaga berkat tas thermal yang didesain khusus
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="testimoni">
        <div class="inner">
            <h3 class="text-center">TESTIMONI</h3>
            <div class="border"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="testi">
                            <img src="./img/images.PNG" alt="">
                            <div class="nama">Zul Efendi</div>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p>Masakan Makassar yang sangat enak yang pernah saya rasa. Saya tidak menyesal datang
                                jauh-jauh di sini saya dapat
                                menikmati
                                makanan khas Makassar yang enak dan dapat mengisi semula tenaga saya.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="testi">
                            <img src="./img/images.JFIF" alt="">
                            <div class="nama">Sarmila</div>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p>Paket makanan yang saya terima masih panas dan packingnya rapi banget, Entar kapan-kapan
                                saya
                                pesan lagi ya.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="testi">
                            <img src="./img/download.PNG" alt="">
                            <div class="nama">Muh Ilham</div>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p>
                                Saya lapar makanya saya pesan Coto dari Rumah Makan HOME COOKING MAKASSAR,
                                pesanan
                                saya sampai dalam 5 menit dan cotonya enak banget.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="js/jquery.slicknav.min.js" type="text/javascript"></script>
</body>
</html>
