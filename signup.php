<?php
include "functions.php";

if (isset($_POST["signup"])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
    alert('Sign up berhasil.');
    document.location.href = 'signin.php';
    </script>";
  } else {
    echo mysqli_error($mysql);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <!-- CSS Internal -->
  <style>
    .btn {
      margin-right: 10px;
      border: transparent;
      border-radius: 20px;
      background-color: #000000;
      color: #eaeaea;
      padding: 5px 15px;
      font-size: 15px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: transparent;
      color: #000000;
      transition: 0.3s all ease-in-out;
    }
  </style>
  <title>PILMART - Registrasi</title>
</head>

<body style="font-family: Inter; background-color: #f3f3f3;">
  <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="card p-3" style="width: 800px;">
      <div class="card-body">
        <h5 class="card-title text-center py-3">Registrasi Akun</h5>
        <div class="d-flex justify-content-center">
          <form action="" method="post" style="width: 900px;" class="px-3">
            <div class="mb-3 row align-items-center">
              <label for="username" class="col-sm-2 col-form-label text-center">Username</label>
              <div class="col-sm-10">
                <input type="text" id="username" class="form-control" name="username">
              </div>
            </div>

            <div class="mb-3 row align-items-center">
              <label for="password" class="col-sm-2 col-form-label text-center">Password</label>
              <div class="col-sm-10">
                <input type="password" id="password" class="form-control" name="password">
              </div>
            </div>

            <div class="mb-3 row align-items-center">
              <label for="repassword" class="col-sm-2 col-form-label text-center">Re-Enter Password</label>
              <div class="col-sm-10">
                <input type="password" id="repassword" class="form-control" name="repassword">
              </div>
            </div>

            <div class="mb-3 row justify-content-center my-2">
              <button type="submit" name="signup" class="btn btn-primary w-25">Sign up</button>
            </div>
            <div class="mb-3 row justify-content-center my-2">
              <p class="text-center" style="font-size: 14px;">Sudah punya akun? <a href="signin.php">Sign in</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>