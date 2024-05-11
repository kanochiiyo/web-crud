<?php
// Konek ke DB
$mysql = mysqli_connect("localhost", "root", "", "supermarket");
if (!$mysql) {
  die("Tidak bisa terhubung dengan database.");
}

// Fungsi untuk mengambil data
function query($query)
{
  global $mysql;
  $result = mysqli_query($mysql, $query);
  if (!$result) {
    die("Error in query: " . mysqli_error($mysql));
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

// Fungsi untuk menambahkan data
function tambah($post)
{
  global $mysql;
  $name = htmlspecialchars($post["name"]);
  $category = htmlspecialchars($post["category"]);
  $stock = htmlspecialchars($post["stock"]);
  $price = htmlspecialchars($post["price"]);

  $query = "INSERT INTO products VALUES ('', '$name', '$category', '$stock', '$price')";
  mysqli_query($mysql, $query);

  return mysqli_affected_rows($mysql);
}

// Fungsi untuk mengubah data
function ubah($post)
{
  global $mysql;
  $id = $post["id"];
  $name = htmlspecialchars($post["name"]);
  $category = htmlspecialchars($post["category"]);
  $stock = htmlspecialchars($post["stock"]);
  $price = htmlspecialchars($post["price"]);
  $query = "UPDATE products SET id = '$id', name = '$name', category = '$category', stock = '$stock', price = '$price' WHERE id=$id";
  mysqli_query($mysql, $query);

  return mysqli_affected_rows($mysql);
}

// Fungsi untuk menghapus data
function hapus($post)
{
  global $mysql;
  $id = $post["id"];
  $query = "DELETE FROM products WHERE id=$id";
  mysqli_query($mysql, $query);
  return mysqli_affected_rows($mysql);
}

// Fungsi untuk registrasi
function registrasi($post)
{
  global $mysql;

  $username = strtolower(stripslashes($post["username"]));
  $password = mysqli_real_escape_string($mysql, $post["password"]);
  $repassword = mysqli_real_escape_string($mysql, $post["repassword"]);

  $result = mysqli_query($mysql, "SELECT username FROM users WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
    alert('Registrasi gagal. Username sudah terdaftar.');
    </script>";
    return false;
  }

  if ($password != $repassword) {
    echo "<script>
    alert('Registrasi gagal. Password tidak matching.');
    </script>";
    return false;
  }

  $password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users VALUES ('', '$username', '$password')";
  mysqli_query($mysql, $query);

  return mysqli_affected_rows($mysql);
}
?>