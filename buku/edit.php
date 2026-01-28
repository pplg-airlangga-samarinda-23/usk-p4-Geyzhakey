<?php

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM buku WHERE id=?";
    $book = $koneksi->execute_query($sql, [$id])->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];
    $id = $_GET['id'];

    $sql = "UPDATE buku SET judul=?, pengarang=?, stok=? WHERE id=?";
    $result = $koneksi->execute_query($sql, [$judul, $pengarang, $stok, $id]);

    if($result) {
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit buku</title>
</head>
<body>
    <h1>edit buku</h1>
    <form action="" method="POST">
        <div class="form-item">
        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" value="<?= $book['judul'] ?>"><br>
        </div>
        <div class="form-item">
        <label for="pengarang">Pengarang:</label><br>
        <input type="text" id="pengarang" name="pengarang" value="<?= $book['pengarang'] ?>"><br>
        </div>
        <div class="form-item">
        <label for="stok">Stok:</label><br>
        <input type="number" id="stok" name="stok" value="<?= $book['stok'] ?>"><br>
        </div>
        <button type="submit">edit</button>
</body>
</html>