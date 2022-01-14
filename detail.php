<?php
session_start();
include 'konfig.php';
$id_menu = $_GET["id"];
$ambil = mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu=$id_menu");
$detail = $ambil->fetch_assoc();
include 'headatas.php';
?>
<title><?php echo $detail["nama_menu"]; ?></title>
<?php
include 'headbawah.php';
?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<h2 class="title text-center">Detail Menu</h2>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin/gambar_menu/<?php echo $detail["gambar_menu"]; ?>" alt="" class="img-responsive">
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $detail["nama_menu"]; ?></h2>
								<p>ID Menu: <?php echo $detail["id_menu"]; ?></p>
								<div><span>
									<span style="margin-top:-12px;">Rp. <?php echo number_format($detail["harga_menu"]); ?></span>									
									</span></div>
									<form action="" method="POST">
									<span style="margin-top:-30px;"><b style="font-size:20px; color:#555">Kuantitas:</b>
											<input type="number" min="1" value="1" name="jumlah"></span>	
									<button type="submit" name="beli" class="btn btn-fefault cart">Beli</button>
									</form>
									<p><b>Deskripsi Menu:</b> <?php echo $detail["deskripsi_menu"]; ?></p>
									<?php
									if(isset($_POST["beli"]))
									{
										$jumlah = $_POST["jumlah"];
										$_SESSION["keranjang"][$id_menu] = $jumlah;
										echo "<script>alert('Menu telah masuk ke keranjang belanja');</script>";
										echo "<script>location='keranjang.php';</script>";
										echo $koneksi->error;
									}
									?>
							</div><!--/product-information-->
						</div>
                    </div><!--/product-details-->
				</div>
			</div>
		</div>
	</section>
    <?php
    include 'footer.php';
    ?>