<?php
session_start();
include '../config/db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Validasi
    if (empty($username) || empty($password) || empty($password2)) {
        $error = "Semua field wajib diisi!";
    } elseif ($password !== $password2) {
        $error = "Password tidak sama!";
    } else {
        // Cek username sudah ada
        $stmt = $conn->prepare("SELECT id FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = "Username sudah terdaftar!";
        } else {
            // Simpan user baru
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hash);
            if ($stmt->execute()) {
                $success = "Registrasi berhasil! Silakan login.";
            } else {
                $error = "Registrasi gagal!";
            }
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container" style="max-width:400px;margin-top:100px;">
    <div class="card">
        <div class="card-header text-center">Registrasi Admin</div>
        <div class="card-body">
            <?php if($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <?php if($success): ?>
                <div class="alert alert-success"><?= $success ?></div>
                <a href="login.php" class="btn btn-success btn-block">Login Sekarang</a>
            <?php else: ?>
            <form method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Ulangi Password</label>
                    <input type="password" name="password2" class="form-control" required>
                </div>
                <button class="btn btn-primary btn-block">Daftar</button>
            </form>
            <div class="mt-2 text-center">
                <a href="login.php">Sudah punya akun? Login</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html> 