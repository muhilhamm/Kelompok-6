</head>
<body>
    <section class="navsemua">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div class="logo pull-left">
                    <a href="index.php"><img src="logo.png" alt="" /></a>               
                </div>
            </div>
            <div class="col-sm-10">
                <div class="shop-menu pull-right">
                    <ul class="navbar-semua">
                        <li><a href="index.php"><i class="fas fa-home"></i> Beranda</a></li>
                        <li><a href="menu.php"><i class="fas fa-utensils"></i> Menu</a></li>
                        <li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i> Keranjang</a></li>
                        <!-- Jika Sudah login ada session -->
                        <?php if(isset($_SESSION["user"])) :  ?>
                        <li><a href="riwayat.php"><i class="fas fa-history"></i> Riwayat</a></li>
                        <li><a href="keluar.php"><i class="fa fa-lock"></i> Keluar</a></li>
                        <?php else:   ?>
                        <li><a href="masuk.php"><i class="fa fa-lock"></i> Masuk</a></li>
                        <?php endif  ?>
                        
                        <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- End Navbar -->
    <section>
		<div class="container">
			<div class="row">