<?php
session_start();
include 'konfig.php';
include 'headatas.php';
?>
<title>Menu</title>
<?php
include 'headbawah.php';
?>
				<link rel="stylesheet" href="pagination/css/pagination.css" type="text/css">
    			<link rel="stylesheet" href="pagination/css/A_green.css" type="text/css">
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Daftar Menu</h2>
						<?php $ambil = $koneksi->query("SELECT * FROM menu "); ?>
						<?php while($permenu = $ambil->fetch_assoc()) {
						?>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/gambar_menu/<?php echo $permenu["gambar_menu"]; ?>" alt="" width="180" height="250"/>
										<a href="detail.php?id=<?php echo $permenu["id_menu"]; ?>"><h2 style="font-size:15px"><?php echo $permenu["nama_menu"]; ?></h2></a>
										<p>Rp. <?php echo number_format($permenu["harga_menu"]); ?></p>
										<a href="tambah_menu.php?id=<?php echo $permenu["id_menu"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah Menu</a>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <?php
    include 'footer.php';
    ?>