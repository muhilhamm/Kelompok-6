<?php
session_start();
include 'konfig.php';
include 'headatas.php';
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))  {
    echo "<script>alert('Keranjang Kosong! Silakan pilih menu.');</script>";
    echo "<script>location='menu.php';</script>";
}
?>
<title>Keranjang</title>
<style>
    .scrollt {
        display: block;
        overflow: hidden;
    }
    .glyphicon {
    font-size: 25px;
}
</style>
<?php
include 'headbawah.php';
?>
	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
                        <tr class="cart_menu">
                            <td class="image">Menu</td>
                            <td class="description">Nama</td>
                            <td class="price">Harga</td>
                            <td class="quantity">Kuantitas</td>
                            <td class="total">Subharga</td>
                            <td class="aksi">Aksi</td>
                        </tr>
                    </thead>
                        <tbody>
                            <?php foreach ($_SESSION["keranjang"] as $id_menu => $jumlah ): ?>
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
                            $pecah = $ambil -> fetch_assoc();
                            $Subharga = $pecah["harga_menu"]*$jumlah;                          
                            ?>
                            <tr>
                                <td class="cart_product"><img src="admin/gambar_menu/<?php echo $pecah['gambar_menu'];?>" alt="" width="80" height="80"></td>
                                <td class="cart_description"><p><?php echo $pecah['nama_menu'];?></p></td>
                                <td class="cart_price"><p>Rp. <?php echo number_format($pecah['harga_menu']);?></p></td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $jumlah;?>" autocomplete="off" size="2" readonly>
                                    </div>
                                </td>
                                <td class="cart_total" > <p class="cart_total_price" style="font-size:20px;">Rp. <?php echo number_format($Subharga);?></p> </td>
                                <td><a href="hapus.php?id=<?php echo $id_menu ?>" ><span style="color:#e67e22;"  class="glyphicon glyphicon-trash"></span></a></td>
                            <?php endforeach ?>
                            </tr>
                        </tbody>
                </table>
                <a style="float:right; " href="checkout.php" class="btn btn-primary">Checkout</a> 
                <a style="float:right; margin-right:50px;" href="menu.php" class="btn btn-primary">Lanjutkan Belanja</a>
            </div>
		</div>
	</section> <!--/#cart_items-->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>