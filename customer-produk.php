<?php
require("conn.php");
$sql = "SELECT * FROM produk";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="d-flex align-items-center" style="background-color: #edba22; height: 100vh;margin-top:100px">
    <div class="container-fluid" style="width: 100%; padding:100px; margin-top:100px">
        <div class="row align-items-left" style="padding-left: 3vh;">
            <div class="col justify-content-end">
                <h1><b>Menu</b></h1>
            </div>
            <div class="col justify-content-end d-flex" style="padding-right: 3vh;">
                <a href="customer-pemesanan.html" type="button" class="btn align-items-right" style="width: 10vh; height: 7vh; background: #00ADE5;">
                    <img src="images/cart white.png" style="width: 4vh;"></a>
            </div>
        </div>
        <div class="row" style="margin: auto;">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-3 mt-2 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="images/<?php echo $row['nama_produk'] ?>.png" alt="Jasmine Tea" style="width: 30vh;">
                                </div>
                            </div>
                            <div class="row" style="margin: auto;">
                                <div class="col">
                                    <h3 style="font-weight: 700;"><?php echo $row['nama_produk'] ?></h3>
                                </div>
                            </div>
                            <div class="row" style="margin: auto;">
                                <div class="col">
                                    <p style="color: #01733F;">Rp.<?php echo $row['harga'] ?></p>
                                </div>
                            </div>
                            <div class="row align-items-right" style="margin: auto; padding-right: auto;">
                                <div class="col d-flex justify-content-end">
                                    <a href="customer-pemesanan.html" type="button" class="btn align-items-right" style="width: 100px; background: #01733F; color: white;">Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>