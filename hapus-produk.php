<?php
$produkID = $_GET['produkID'];
$sql = "DELETE FROM produk WHERE produkID='$produkID'";

require('conn.php');
mysqli_query($conn, $sql);
header('location: seller-awal.php');
