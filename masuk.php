<?php
require ("conn.php");

if(isset($_POST['masuk'])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email ='$email' AND password='$password'");

    //cek email
    if(mysqli_num_rows($result)===1){
        //cek password dan tipe
        $row = mysqli_fetch_assoc($result);
        if ($row['tipe'] == "penjual") {
            header("location: seller-awal.php");
            exit;
          } else {
            header("location: customer-awal.php");
            exit;
        }
    }
    $error = true;
}


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Masuk</title>
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
          <h2 class="card-title" style="color: #01733f">Masuk</h2>
            <?php if(isset($error)): ?>
                <p>GAGAL LOGIN! Password atau email salah </p>
            <?php endif; ?>
        <form action="" method="post">
          <label class="form-label mt-5" for="email">E-mail</label>
          <input type="email" name="email" class="form-control" placeholder="Masukkan e-mail" />
          <label class="form-label mt-4" for="password">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Masukkan password" />
          <label class="form-label mt-4"><a href="daftar.php">Belum punya akun?</a></label>
          <br />
          <div class="d-flex justify-content-end">
            <button  type="submit" name="masuk" class="btn mt-5 align-items-right" style="width: 100px; background: #01733f; color: white"><b>Masuk</b></button>
          </div>
        </form>
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
