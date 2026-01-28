<?php

include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, password, role) VALUES (?, ?, ?)";
    $result = $koneksi->execute_query($sql, [$username, $hashed, $role]);

    if($result) { 
    header('Location: login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login Sistem Perpustakaan</h1>
    <div class="form-item">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="form-item">
        <label for="password">Password</label>
        <input style="margin-left: 4px;" type="password" name="password" id="password">
    </div>
    <p>Already have an account? <a style="text-decoration: none;" href="login.php">Login</a> now</p>
    <button><a href="buku/index.php" style="text-decoration: none; color: black;">Register</a></button>
    <select>
        <option value="siswa">siswa</option>
        <option value="admin">admin</option>
    </select>
</body>
</html>