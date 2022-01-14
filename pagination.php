<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="pagination/css/pagination.css" type="text/css">
    <link rel="stylesheet" href="pagination/css/A_green.css" type="text/css">
</head>
<body>
    
<?php
include 'konfig.php';
include 'pagination/function.php';
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $limit = 5;
    $startpoint = ($page + $limit) - $limit;
    $statement = "TABLE ORDER BY NAME ACS";

$sql = mysqli_query($koneksi, "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
while($row=mysqli_fetch_array($sql)) {
    echo $row["nama_menu"];
    echo "<br>";
}


?>

<?php

echo "<div id='pagingg>";
echo pagination($statement,$limit,$page);
echo "</div>";

?>


</body>
</html>