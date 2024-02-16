<?php
$metodeID = $_GET["metodeID"];

require("conn.php");
$sql = "SELECT * FROM metode WHERE metodeID='$metodeID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ubah Metode</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="d-flex align-items-center" style="background-color: #edba22; height: 100vh">
  <div class="container" style="width: 30%">
    <div class="card">
      <div class="card-body">
        <form action="ubah-metode.php" method="POST">
          <input type="text" style="display: none;" name="metodeID" value="<?php echo $metodeID ?>">
          <h2 class="card-title" style="color: #01733f">Ubah Metode</h2>
          <label class="form-label mt-5">Nama Metode</label>
          <input type="text" class="form-control" name="nama_metode" value="<?php echo $row['nama_metode'] ?>" />
          <br />
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn mt-5 align-items-right" style="width: 100px; background: #00ade5; color: white; margin-right: 20px"><b>Ubah</b></button>
            <button type="reset" class="btn mt-5 align-items-right" style="width: 100px; background: #5b5b5b; color: white"><b>Reset</b></button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>