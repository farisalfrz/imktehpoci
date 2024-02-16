<?php
$metodeID = $_GET['metodeID'];
$sql = "DELETE FROM metode WHERE metodeID='$metodeID'";

require('conn.php');
mysqli_query($conn, $sql);
header('location: seller-awal.php');
