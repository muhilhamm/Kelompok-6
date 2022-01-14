<?php
include 'konfig.php';
if ($masuk == 0) {
    echo "<meta http-equiv='refresh' content='0; url=masuk.php'>";
} else {
    $id_user = $_COOKIE['id'];
    $getInfo = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id_user ");
    $array = mysqli_fetch_array($getInfo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <style>
    span {
        color:white;
    }
    </style>
    <title>Document</title>
</head>
<body>
<div class="akun-box">
    <h1>SELMAT DATANG <?php echo $array['nama']; ?></h1>
    <div class="akuntextbox">
        <span><b>Nama:</b> <?php echo $array['nama']; ?> </span><br>
    </div>
    <div class="akuntextbox">
        <span><b>Email:</b> <?php echo $array['email']; ?> </span><br>
    </div>
    <div class="akuntextbox">
        <span><b>Kontak/No. HP:</b> <?php echo $array['kontak']; ?> </span><br>
    </div>
    <div class="akuntextbox">
        <span><b>Alamat:</b> <?php echo $array['alamat']; ?> </span><br>
    </div>
</div>
<a href="keluar.php">Keluar</a>
</body>
</html>
<?php
}
?>