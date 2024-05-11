<?php
session_start();
include "functions.php";

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];

  $result = mysqli_query($mysql, "SELECT username FROM users WHERE id =$id");
  $row = mysqli_fetch_assoc($result);
  if ($key === hash('sha256', $row["username"])) {
    $_SESSION["signin"] = true;
  }
}

if (isset($_SESSION["signin"])) {
  header("Location:index.php");
  exit();
}

if (isset($_POST["signin"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($mysql, "SELECT * FROM users WHERE username = '$username'");

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["signin"] = true;
      if (isset($_POST["cookie"])) {
        setcookie('uid', $row["id"], time() + 86400);
        setcookie('key', hash('sha256', $row["username"], time() + 86400));
      }
      header("Location:index.php");
      exit;
    }
  }
  $error = true;
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
  <title>PILMART - Login</title>
</head>

<body style="font-family: Inter; background-color: #f3f3f3;">
  <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="card p-3" style="width: 800px;">
      <div class="card-body">
        <h5 class="card-title text-center py-3">Login Akun</h5>
        <?php if (isset($error)) { ?>
          <p style="color: red;">Username / Password salah!</p>
          <br>
        <?php } ?>
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

            <div class="mb-3 form-check align-items-center">
              <input class="form-check-input d-inline" type="checkbox" value="" id="cookie" name="cookie">
              <label class="form-check-label d-inline" for="cookie">
                Remember Me
              </label>
            </div>

            <div class="mb-3 row justify-content-center my-2">
              <button type="submit" name="signin" class="btn btn-primary w-25">Sign in</button>
            </div>
            <div class="mb-3 row justify-content-center my-2">
              <p class="text-center" style="font-size: 14px;">Belum punya akun? <a href="signup.php">Sign Up</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>