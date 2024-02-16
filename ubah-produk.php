<?php
$produkID = $_POST['produkID'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

require("conn.php");
$sql = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', stok='$stok' WHERE produkID='$produkID'";
$result = mysqli_query($conn, $sql);

header("location: seller-awal.php");
