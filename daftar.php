<?php
require ("conn.php");

if(isset($_POST['daftar'])){
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  

  $hasil = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

  if(mysqli_num_rows($hasil) != 0){
    echo "<body class='d-flex align-items-center' style='background-color: #edba22; height: 100vh'>
    <center><h1 style='color:#01733f;'>Daftar Gagal! Email sudah digunakan</h1><hr>
    <h3 style='color:#01733f;'>Silahkan kembali ke halaman daftar</h3></body>";
    
  } else {
    mysqli_query($conn, "INSERT INTO user VALUES('','$email','$password','$nama','pembeli')");;
    echo "<script>
          alert('Akun berhasil ditambahkan!');
          </script>";
    header("location: masuk.php");
      exit;
  }
  return mysqli_affected_rows($conn);

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body class="d-flex align-items-center" style="background-color: #edba22; height: 100vh">
    <div class="container" style="width: 30%">
      <div class="card">
        <div class="card-body">
          <h2 class="card-title" style="color: #01733f">Daftar</h2>
          <form action="" method="post">
          <label class="form-label mt-5" for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama" />
          <label class="form-label mt-4" for="email">E-mail</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan e-mail" />
          <label class="form-label mt-4" for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" />
          <label class="form-label mt-4"><a href="masuk.php">Sudah punya akun?</a></label>
          <br />
          <div class="d-flex justify-content-end">
            <button type="submit" name="daftar" class="btn mt-5 align-items-right" style="width: 100px; background: #01733f; color: white"><b>Daftar</b></button>
          </div>
        </div>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
