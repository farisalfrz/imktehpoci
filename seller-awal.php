<?php
require("conn.php");
// Ambil total pemesanan
$sql1 = "SELECT COUNT(*) AS total_pemesanan FROM pemesanan";
$result1 = mysqli_query($conn, $sql1);

// Ambil total pendapatan
$sql2 = "SELECT SUM(produk.harga * pemesanan.qty) AS total_pendapatan FROM pemesanan JOIN produk ON pemesanan.produkID=produk.produkID";
$result2 = mysqli_query($conn, $sql2);

// Ambil produk
$sql3 = "SELECT * FROM produk";
$result3 = mysqli_query($conn, $sql3);

// Ambil pemesanan
$sql4 = "SELECT nama, nama_produk, qty, harga, waktu FROM pemesanan JOIN user ON pemesanan.userID=user.userID JOIN produk ON pemesanan.produkID=produk.produkID";
$result4 = mysqli_query($conn, $sql4);

// Ambil metode pembayaran
$sql5 = "SELECT * FROM metode";
$result5 = mysqli_query($conn, $sql5);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Penjual</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body style="background-color: #edba22">
  <div class="container-fluid">
    <center>
      <!-- Heading -->
      <div style="padding:100px">
        <div class="row align-items-left">
          <div class="col"></div>
          <div class="col d-flex justify-content-end">
            <a href="index.html" class="btn btn-danger"><img src="images/logout.png" width="20vh" alt="" style="color: white;">Logout</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h1 class="align-items-left" style="font-size: 75px; text-align: start"><b>ES TEH POCI UNIKOM</b></h1>
          </div>
          <div class="col">
            <div class="d-flex justify-content-end">
              <a href="seller-pemesanan.php" type="button" class="btn mt-5 align-items-left" style="width: 200px; background: #00ADE5; color: white"><b>Notifikasi</b></a>
            </div>
          </div>
        </div>

        <!-- Data -->
        <div class="row mt-5">
          <!-- Total Pesanan -->
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title" style="text-align: start">Total Pesanan</h3>
                <div class="d-flex justify-content-end">
                  <?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                    <h1 class="align-items-right"><?php echo $row1["total_pemesanan"] ?></h1>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <!-- Total Pendapatan -->
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title" style="text-align: start">Total Pendapatan</h3>
                <div class="d-flex justify-content-end">
                  <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                    <h1 class="align-items-right" style="text-align: right">Rp. <?php echo $row2["total_pendapatan"] ?></h1>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tab -->
        <div class="row align-items-start">
          <div class="col d-flex justify-content-start">
            <button class="btn btn-dark align-items-left mt-5" style="text-align: start; margin-right: 10px;" onclick="openTab('Produk')"><b>Produk</b></button>
            <button class="btn btn-dark align-items-left mt-5" style="text-align: start; margin-right: 10px;" onclick="openTab('Pemesanan')"><b>Pemesanan</b></button>
            <button class="btn btn-dark align-items-left mt-5" style="text-align: start; margin-right: 10px;" onclick="openTab('Metode')"><b>Metode Pembayaran</b></button>
          </div>
        </div>

        <!-- Produk -->
        <div id="Produk" class="kotak" style="display: block;">
          <!-- Table Header -->
          <div class="row align-items-center">
            <div class="col d-flex justify-content-start">
              <h2 class="align-items-left mt-3" style="text-align: start"><b>Tabel Produk</b></h2>
            </div>
            <div class="col d-flex justify-content-end">
              <a href="seller-tambah-produk.html" type="button" class="btn mt-3 align-items-right" style="width: 100px; background: #01733f; color: white"><b>Tambah</b></a>
            </div>
          </div>

          <!-- Table -->
          <div class="row mt-3">
            <div class="col">
              <table class="table table-bordered rounded-2 overflow-hidden">
                <thead class="table-light">
                  <tr style="text-align: center">
                    <th style="width: 25%; background-color: #01733f; color: white">Nama Produk</th>
                    <th style="width: 25%; background-color: #01733f; color: white">Harga</th>
                    <th style="width: 25%; background-color: #01733f; color: white">Stok</th>
                    <th style="width: 25%; background-color: #01733f; color: white">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row3 = mysqli_fetch_assoc($result3)) { ?>
                    <tr>
                      <td style="display: none;"><?php echo $row3["produkID"] ?></td>
                      <td><?php echo $row3["nama_produk"] ?></td>
                      <td><?php echo $row3["harga"] ?></td>
                      <td><?php echo $row3["stok"] ?></td>
                      <td class="align-items-center">
                        <a href="seller-ubah-produk.php?produkID=<?php echo $row3["produkID"] ?>" type="button" class="btn" style="width: 100px; background: #00ade5; color: white"><b>Ubah</b></a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row3['produkID'] ?>">
                          <b>Hapus</b>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row3['produkID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan!!!</h1>
                              </div>
                              <div class="modal-body">
                                Apakah anda yakin akan menghapus produk ini?
                                <br>
                                <b><?php echo $row3['nama_produk'] ?></b>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="hapus-produk.php?produkID=<?php echo $row3["produkID"] ?>" type="button" class="btn btn-danger">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Pemesanan -->
        <div id="Pemesanan" class="kotak" style="display: none;">
          <!-- Table Header -->
          <div class="row align-items-center">
            <div class="col d-flex justify-content-start">
              <h2 class="align-items-left mt-3" style="text-align: start"><b>Tabel Pemesanan</b></h2>
            </div>
          </div>

          <!-- Table -->
          <div class="row mt-3">
            <div class="col">
              <table class="table table-bordered rounded-2 overflow-hidden">
                <thead class="table-light">
                  <tr style="text-align: center">
                    <th style="width: 20%; background-color: #01733f; color: white">Nama Pembeli</th>
                    <th style="width: 20%; background-color: #01733f; color: white">Nama Produk</th>
                    <th style="width: 20%; background-color: #01733f; color: white">QTY</th>
                    <th style="width: 20%; background-color: #01733f; color: white">Total</th>
                    <th style="width: 20%; background-color: #01733f; color: white">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row4 = mysqli_fetch_assoc($result4)) { ?>
                    <tr>
                      <td><?php echo $row4["nama"] ?></td>
                      <td><?php echo $row4["nama_produk"] ?></td>
                      <td><?php echo $row4["qty"] ?></td>
                      <td>Rp. <?php echo $row4["qty"] * $row4["harga"] ?></td>
                      <td><?php echo $row4["waktu"] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Metode Pembayaran -->
        <div id="Metode" class="kotak" style="display: none;">
          <!-- Table Header -->
          <div class="row align-items-center">
            <div class="col d-flex justify-content-start">
              <h2 class="align-items-left mt-3" style="text-align: start"><b>Tabel Metode Pembayaran</b></h2>
            </div>
            <div class="col d-flex justify-content-end">
              <a href="seller-tambah-metode.html" type="button" class="btn mt-3 align-items-right" style="width: 100px; background: #01733f; color: white"><b>Tambah</b></a>
            </div>
          </div>

          <!-- Table -->
          <div class="row mt-3">
            <div class="col">
              <table class="table table-bordered rounded-2 overflow-hidden">
                <thead class="table-light">
                  <tr style="text-align: center">
                    <th style="width: 25%; background-color: #01733f; color: white">Nama Metode</th>
                    <th style="width: 25%; background-color: #01733f; color: white">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row5 = mysqli_fetch_assoc($result5)) { ?>
                    <tr>
                      <td><?php echo $row5["nama_metode"] ?></td>
                      <td class="align-items-center">
                        <a href="seller-ubah-metode.php?metodeID=<?php echo $row5["metodeID"] ?>" type="button" class="btn" style="width: 100px; background: #00ade5; color: white"><b>Ubah</b></a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#metodeModal<?php echo $row5['metodeID'] ?>">
                          <b>Hapus</b>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="metodeModal<?php echo $row5['metodeID'] ?>" tabindex="-1" aria-labelledby="metodeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="metodeModalLabel">Peringatan!!!</h1>
                              </div>
                              <div class="modal-body">
                                Apakah anda yakin akan menghapus Metode Pembayaran ini?
                                <br>
                                <b><?php echo $row5['nama_metode'] ?></b>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="hapus-metode.php?metodeID=<?php echo $row5["metodeID"] ?>" type="button" class="btn btn-danger">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </center>
  </div>

  <!-- Buka Tab -->
  <script>
    function openTab(tab) {
      var i;
      var x = document.getElementsByClassName("kotak");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      document.getElementById(tab).style.display = "block";
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>