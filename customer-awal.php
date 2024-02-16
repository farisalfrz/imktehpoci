<?php
require("conn.php");
$sql = "SELECT * FROM lokasi";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembeli</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body style="background-color: #edba22">
  <div class="container-fluid">
    <div style="padding: 100px">
      <div class="row">
        <div class="col">
          <h1><b>LOKASI</b></h1>
        </div>
      </div>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="card mt-3">
          <div class="card-body">
            <div class="row" style="margin: auto">
              <div class="col">
                <h4 style="font-weight: 700"><?php echo $row['nama_lokasi'] ?></h4>
              </div>
              <div class="col">
                <div class="d-flex justify-content-end">
                  <a href="customer-produk.php" type="button" class="btn align-items-right" style="width: 100px; background: #01733f; color: white; margin-right:100px;"><b>Lihat</b></a>
                </div>
              </div>
            </div>
            <div class="row" style="margin: auto">
              <div class="col">
                <p><?php echo $row['alamat'] ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</body>

</html>