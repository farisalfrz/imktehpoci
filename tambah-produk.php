<?php
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

require("conn.php");
$sql = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama_produk', '$harga', '$stok')";
$result = mysqli_query($conn, $sql);

header("location: seller-awal.php");
