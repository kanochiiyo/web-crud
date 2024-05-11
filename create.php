<?php
session_start();
include "functions.php";

if (!isset($_SESSION["signin"])) {
  header("Location:signin.php");
  exit();
}

// Cek apakah tombol Submit ditekan (data dikirimkan)
if (isset($_POST["submit"])) {
  // Expression di percabangan ini berasal dari nilai yang direturn oleh fungsi di functions.php di mana fungsi tsb mengembalikan nilai 1 jika ada row yang berubah dan -1 jika tidak ada row yang berubah
  if (tambah($_POST) > 0) {
    echo "<script>
    alert('Data berhasil ditambahkan.');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "<script>
    alert('Gagal menambahkan data.');
    document.location.href = 'index.php';
    </script>";
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
      border-radius: 10px;
      background-color: #000;
      color: #eaeaea;
      padding: 5px;
      font-size: 13px;
      text-decoration: none;
      display: inline-block;
    }

    .btn:hover {
      background-color: transparent;
      color: #000000;
      transition: 0.3s all ease-in-out;
    }
  </style>
  <title>Supermarket - Tambah Data Produk</title>
</head>

<body style="font-family: Inter; background-color: #f3f3f3;">
  <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="card p-3" style="width: 800px;">
      <div class="card-body">
        <h5 class="card-title text-center py-3">Tambah Data Produk</h5>
        <div class="d-flex justify-content-center">
          <form action="" method="post" style="width: 900px;" class="px-3">
            <div class="mb-3 row d-flex align-items-center">
              <label for="name" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" id="name" class="form-control" name="name">
              </div>
            </div>

            <div class="mb-3 row d-flex align-items-center">
              <label for="category" class="col-sm-2 col-form-label">Kategori</label>
              <div class="col-sm-10">
                <select class="form-control" name="category" id="category">
                  <option value="">- Pilih kategori -</option>
                  <option value="Foods">Makanan</option>
                  <option value="Drinks">Minuman</option>
                  <option value="Electronic">Elektronik</option>
                </select>
              </div>
            </div>

            <div class="mb-3 row d-flex align-items-center">
              <label for="stock" class="col-sm-2 col-form-label">Stok</label>
              <div class="col-sm-10">
                <input type="number" id="stock" class="form-control" name="stock" min="0">
              </div>
            </div>

            <div class="mb-3 input-group ">
              <label for="price" class="col-sm-2 col-form-label">Harga</label>
              <span class="input-group-text rounded">Rp</span>
              <input type="number" id="price" class="form-control rounded" name="price" min="0">
            </div>

            <div class="mb-3 row d-flex justify-content-center my-2">
              <button type="submit" name="submit" class="btn btn-primary w-25">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


</body>

</html>