<?php

include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO buku (judul, pengarang, stok) VALUES (?, ?, ?)";
    $result = $koneksi->execute_query($sql,[$judul, $pengarang, $stok]);

    if ($result) {
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Tambah Buku</h1>

    <form action="" method="post">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" required><br>

        <label for="pengarang">Pengarang:</label>
        <input type="text" name="pengarang" id="pengarang" required><br>

        <label for="stok">Stok:</label>
        <input type="number" name="stok" id="stok" required><br>

        <button type="submit">Create</button>
    </form>
</body>
</html>