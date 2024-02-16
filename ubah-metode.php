<?php
$metodeID = $_POST['metodeID'];
$nama_metode = $_POST['nama_metode'];

require("conn.php");
$sql = "UPDATE metode SET nama_metode='$nama_metode' WHERE metodeID='$metodeID'";
$result = mysqli_query($conn, $sql);

header("location: seller-awal.php");
