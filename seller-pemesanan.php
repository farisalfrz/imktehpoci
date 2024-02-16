<?php
require("conn.php");

$sql = "SELECT pemesananID, nama, nama_produk, qty, harga FROM pemesanan JOIN user ON pemesanan.userID=user.userID JOIN produk ON pemesanan.produkID=produk.produkID WHERE status='pending'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="d-flex align-items-center" style="background-color: #edba22; height: 100vh">
  <div class="container-fluid" style="width: 95%">
    <div>
      <h1><b>PEMESANAN</b></h1>
    </div>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="card" style="margin-bottom: 30px">
        <div class="card-body">
          <div class="row justify-content-start">
            <div class="col-1">
              <img src="images/cart.png" width="30vh" />
            </div>
            <div class="col-3">
              <h4>Pesanan Masuk</h4>
            </div>
          </div>
          <div class="row">
            <hr />
          </div>
          <div class="row">
            <div class="col-1">
              <img src="images/people.png" width="40vh" />
            </div>
            <div class="col-7">
              <div class="row">
                <h7><b><?php echo $row['nama'] ?></b></h7>
              </div>
              <div class="row">
                <t><?php echo $row['qty'] ?>x <?php echo $row['nama_produk'] ?></t>
                <t>Rp. <?php echo $row['qty'] * $row['harga'] ?></t>
              </div>
            </div>
            <div class="d-flex col align-items-center justify-content-start">
              <a href="tolak-pemesanan.php?pemesananID=<?php echo $row["pemesananID"] ?>" type="button" class="btn align-items-right " style="width: 100px; background: #ee1a51; color: white; margin-right:10px"><b>Batal</b></a>
              <a href="terima-pemesanan.php?pemesananID=<?php echo $row["pemesananID"] ?>" type="button" class="btn align-items-right " style="width: 100px; background: #01733f; color: white; margin-right:10px"><b>Terima</b></a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>