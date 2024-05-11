<?php
session_start();
include "functions.php";

if (!isset($_SESSION["signin"])) {
  header("Location:signin.php");
  exit();
}

// Ambil ID dari URL
$id = $_GET["id"];

if (hapus($_GET) > 0) {
  echo "<script>
    alert('Data berhasil dihapus.');
    document.location.href = 'index.php';
    </script>";
} else {
  echo "<script>
    alert('Gagal menghapus data.');
    document.location.href = 'index.php';
    </script>";
}
?>