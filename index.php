<?php
session_start();
include 'functions.php';

if (!isset($_SESSION["signin"])) {
  header("Location:signin.php");
  exit();
}

// Untuk nge-pass query ke functions.php (mengambil data)
$data = query("SELECT * FROM products");
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
  <title>PILMART - Data Produk</title>
  <!-- CSS Internal -->
  <style>
    a {
      border-radius: 5px;
      background-color: #000;
      color: #eaeaea;
      padding: 5px;
      font-size: 15px;
      text-decoration: none;
      display: inline-block;
    }

    a:hover {
      background-color: transparent;
      color: #000000;
      transition: 0.3s all ease-in-out;
    }
  </style>
</head>

<body style="font-family: Inter; background-color: #f3f3f3;">
  <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="card p-3" style="width: 800px;">
      <div class="card-body">
        <h5 class="card-title text-center py-3">Data Produk</h5>
        <a href="create.php">Tambah Data</a>
        <a href="signout.php" onclick="return confirm('Yakin ingin sign out?')">Sign out</a>
        <div class="d-flex justify-content-center">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php $i = 1; ?>
              <!-- Looping untuk menampilkan data -->
              <?php foreach ($data as $row) { ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?= $row["name"] ?></td>
                  <td><?= $row["category"] ?></td>
                  <td><?= $row["stock"] ?></td>
                  <td><?= $row["price"] ?></td>
                  <td>
                    <a href="update.php?id=<?= $row["id"] ?>">Ubah</a>
                    <a href="delete.php?id=<?= $row["id"] ?>"
                      onclick="return confirm('Yakin ingin delete data?')">Hapus</a>
                  </td>
                </tr>
                <?php $i++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</body>

</html>