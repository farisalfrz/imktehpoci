<?php
$nama_metode = $_POST['nama_metode'];

require("conn.php");
$sql = "INSERT INTO metode (lokasiID, nama_metode) VALUES (1, '$nama_metode')";
$result = mysqli_query($conn, $sql);

header("location: seller-awal.php");
