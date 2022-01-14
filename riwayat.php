<?php
session_start();
include 'konfig.php';
include 'headatas.php';
?>
<title>Riwayat</title>
<?php
include 'headbawah.php';
if(!isset($_SESSION["user"])) {
    echo "<script>alert('Silakan Login');</script>";
    echo "<script>location='masuk.php';</script>";
}
?>
<section class="riwayat">
    <div class="container">
        <h3>Riwayat Belanjang Pelanggan <?php echo $_SESSION["user"]["nama"] ?> </h3>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $id_user = $_SESSION["user"]["id_user"];
            $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_user=$id_user");
            while($pecah = $ambil->fetch_assoc()) {
            ?>
            <tr>
                <td style="width:25px;"><?php echo $nomor; ?></td>
                <td><?php echo $pecah["tanggal_pembelian"] ?></td>
                <td>Rp. <?php echo $pecah["total_pembelian"] ?></td>
                <td style="width:120px;">
                    <a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>
                </td>
            </tr>
            <?php $nomor++ ?>
            <?php echo $koneksi->error; } ?>
        </tbody>
    </table>
</section>
</body>
</html>