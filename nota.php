<?php
session_start();
include 'konfig.php';
include 'headatas.php';
?>
<?php
include 'headbawah.php';
if(!isset($_SESSION["user"])) {
    echo "<script>alert('Silakan Login');</script>";
    echo "<script>location='masuk.php';</script>";
}
?>
<title>Nota</title>
<section>
    <div class="container">
        <?php
        $ambil = $koneksi->query("SELECT * FROM pembelian JOIN user ON pembelian.id_user=user.id_user WHERE pembelian.id_pembelian='$_GET[id]' ");
        $detail = $ambil->fetch_assoc();
        ?>
        <?php
        $iduseryangbeli = $detail["id_user"];
        $iduseryanglogin = $_SESSION["user"]["id_user"];
        if($iduseryangbeli!==$iduseryanglogin)
        {
            echo "<script>location='riwayat.php'</script>";
            exit();
        }
        ?>
        <div class="row">
            <div class="col-sm-4">
                <h3><b>Detail Pembelian</b></h3>
                <b>No. Pembelian:  <?php echo $detail['id_pembelian']; ?> </b> <br>
                <p>
                Tanggal Pembelian: <?php echo $detail['tanggal_pembelian']; ?> <br>
                Total Harga Belanja: Rp.<?php echo $detail['total_pembelian']; ?>
                </p>
            </div>
            <div class="col-sm-4">
                <h3><strong>Pelanggan</strong></h3>
                <b>Nama: <?php echo $detail['nama']; ?></b> <br>
                <p>
                
                Email: <?php echo $detail['email']; ?> <br>
                Kontak: <?php echo $detail['kontak']; ?>
                </p>
            </div>
            <div class="col-sm-4">
                <h3><strong>Pengiriman</strong></h3>
                <b>Lokasi Pengiriman: <?php echo $detail['alamat_pengiriman']; ?> </b> <br>
                <p>
                
                Ongkos Kirim: <?php echo $detail['tarif']; ?> <br>
                </p>
            </div>
            
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Jumlah </th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1;  ?>
                <?php $ambil = $koneksi->query("SELECT * FROM pembelian_menu WHERE id_pembelian = '$_GET[id]'"); ?>
                <?php while($pecah=$ambil->fetch_assoc()) {  ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['nama_menu']; ?></td>
                    <td>Rp. <?php echo $pecah['harga']; ?></td>
                    <td><?php echo $pecah['jumlah']; ?></td>
                    <td>Rp. <?php echo $pecah['subharga']; ?></td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            <p>Silakan lakukan pembayaran di tempat sebesar  <br>
            <strong>Rp. <?php echo number_format($detail['total_pembelian']); ?></strong></p>
        </div>
    </div>
</div>
</body>
</html>