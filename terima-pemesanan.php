<?php
$pemesananID = $_GET['pemesananID'];

require("conn.php");
$sql = "UPDATE pemesanan SET status='diterima' WHERE pemesananID='$pemesananID'";
$result = mysqli_query($conn, $sql);

header("location: seller-pemesanan.php");
