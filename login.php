<?php

include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $hashed = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $result = $koneksi->execute_query($sql, [$username,$hashed.$role]);
    $cek = $result->fetch_array();

}

if($cek)
    session_start();

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
    <form method="post" action="">
    <div class="form-item">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="form-item">
        <label for="password">Password</label>
        <input style="margin-left: 4px;" type="password" name="password" id="password">
    </div>
    <p>still don't have an account? <a style="text-decoration: none;" href="register.php">Register</a> now</p>
    <button><a href="buku/index.php" style="text-decoration: none; color: black;">Login</a></button>
    </form>
</body>
</html>