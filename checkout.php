<?php
session_start();
include 'konfig.php';
include 'headatas.php';
?>
<title>Checkout</title>
<?php
include 'headbawah.php';
if(!isset($_SESSION["user"])) {
    echo "<script>alert('Silakan Login');</script>";
    echo "<script>location='masuk.php';</script>";
}
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))  {
    echo "<script>alert('Keranjang Kosong! Silakan pilih menu.');</script>";
    echo "<script>location='menu.php';</script>";
}
?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Checkout</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
                        <tr class="cart_menu">
                            <td class="image">Menu</td>
                            <td class="description">Nama</td>
                            <td class="price">Harga</td>
                            <td class="quantity">Kuantitas</td>
                            <td class="total">Subharga</td>
                        </tr>
                    </thead>
                        <tbody>
                            <?php $totalbelanja = 0; ?>
                            <?php foreach ($_SESSION["keranjang"] as $id_menu => $jumlah ): ?>
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
                            $pecah = $ambil -> fetch_assoc();
                            $Subharga = $pecah["harga_menu"]*$jumlah;
                            ?>
                            <tr>
                                <td class="cart_product"><img src="admin/gambar_menu/<?php echo $pecah['gambar_menu'];?>" alt="" width="80" height="80"></td>
                                <td class="cart_description"><p><?php echo $pecah['nama_menu'];?></p></td>
                                <td class="cart_price"><p>Rp. <?php echo  number_format($pecah['harga_menu']);?></p></td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $jumlah;?>" autocomplete="off" size="2" readonly>
                                    </div>
                                </td>
                                <td class="cart_total" > <p class="cart_total_price" style="font-size:20px;">Rp. <?php echo  number_format($Subharga);?></p> </td>
                            </tr>
                            <?php $totalbelanja+=$Subharga; ?>    
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align:right; padding-top:22px;  padding-right:50px;"  class="cart_total_price" colspan="4">Total Belanja</th>
                                <th class="cart_total_price" style="padding-top:22px;">Rp. <?php echo number_format($totalbelanja); ?></th>
                            </tr>
                        </tfoot>
                </table>
            </div>
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="row"> 
                            <div class="col-sm-4">
                                <input type="text" readonly value="<?php echo $_SESSION["user"]["nama"] ?>" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" readonly value="<?php echo $_SESSION["user"]["kontak"] ?>" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <select name="id_ongkir" class="form-control">
                                    <?php  
                                    $ambil = $koneksi->query("SELECT * FROM ongkir");
                                    while($perongkir = $ambil->fetch_assoc()){    
                                    ?>
                                    <option value="<?php echo $perongkir["id_ongkir"] ?>">
                                    <?php echo $perongkir['nama_kota'] ?> -
                                    Rp. <?php echo number_format($perongkir['tarif']) ?> 
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap Pengiriman</label>
                        <textarea name="alamat_pengiriman" placeholder="Masukkan alamat lengkap pengiriman." class="form-control"></textarea>
                    </div>
                    <button style="float:right; " class="btn btn-primary" name="beli">Checkout</button> 
                </form>
                <?php
                if(isset($_POST["beli"])) 
                {
                    $id_user = $_SESSION["user"]["id_user"];
                    $id_ongkir = $_POST["id_ongkir"];
                    $tanggal_pembelian = date("y-m-d");
                    $alamat_pengiriman = mysqli_real_escape_string($koneksi,$_POST["alamat_pengiriman"]);

                    $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
                    $arrayongkir = $ambil->fetch_assoc();
                    $tarif = $arrayongkir['tarif'];
                    $total_pembelian = $totalbelanja + $tarif; 
                    mysqli_query($koneksi,"INSERT INTO `pembelian` (`id_user`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`,`tarif`,`alamat_pengiriman`) VALUES ('$id_user', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian','$tarif','$alamat_pengiriman')");
                    echo $koneksi->error;
                    $id_pembelian_barusan = $koneksi->insert_id;
                    foreach($_SESSION["keranjang"] as $id_menu => $jumlah)
                    {
                        $ambil = $koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
                        $permenu = $ambil->fetch_assoc();
                        $nama = $permenu['nama_menu'];
                        $harga = $permenu['harga_menu'];
                        $subharga = $permenu['harga_menu']*$jumlah;
                        $koneksi->query("INSERT INTO pembelian_menu (id_pembelian,id_menu,jumlah,nama_menu,harga,subharga) VALUES ('$id_pembelian_barusan','$id_menu','$jumlah','$nama','$harga','$subharga')");
                    }
                    unset($_SESSION["keranjang"]);
                    echo "<script>alert('Pembelian sukses.');</script>";
                    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
                } 
                ?>
		</div>
	</section>
</body>
</html>