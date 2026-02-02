<?php
session_start();
include 'koneksi.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $result = $koneksi->execute_query($sql, [$username]);
    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: dashboard_anggota.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
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
    <form method="post" action="">
    <div class="form-item">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>
    <div class="form-item">
        <label for="password">Password</label>
        <input style="margin-left: 4px;" type="password" name="password" id="password">
    </div>
    <select name="role">
        <option value="siswa">siswa</option>
        <option value="admin">admin</option>
    </select>
    <p>still don't have an account? <a style="text-decoration: none;" href="register.php">Register</a> now</p>
    <button type="submit" style="text-decoration: none; color: black;">Login</button>
    <?php 
    if ($error) {
        echo '<p style="color: red;">' . $error . '</p>';
    }
    ?>
    </form>
</body>
</html>