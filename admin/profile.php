<?php
session_start();
include '../config/db.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
$admin_id = $_SESSION['admin_id'];
$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photo'])) {
    $file = $_FILES['photo'];
    if ($file['error'] == 0) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = 'admin_' . $admin_id . '.' . $ext;
        if (!is_dir('uploads')) mkdir('uploads');
        move_uploaded_file($file['tmp_name'], 'uploads/' . $filename);
        $conn->query("UPDATE admin SET photo='$filename' WHERE id=$admin_id");
        $_SESSION['admin_photo'] = $filename;
        $msg = 'Foto berhasil diubah!';
    } else {
        $msg = 'Upload gagal!';
    }
}
$admin = $conn->query("SELECT * FROM admin WHERE id=$admin_id")->fetch_assoc();
$photo = $admin['photo'] ? 'uploads/' . $admin['photo'] : 'https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profile Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="max-width:400px;margin-top:50px;">
    <div class="card">
        <div class="card-header text-center">Profile Admin</div>
        <div class="card-body text-center">
            <?php if($msg): ?>
                <div class="alert alert-info"><?= $msg ?></div>
            <?php endif; ?>
            <img src="<?= $photo ?>" class="img-thumbnail mb-3" width="120">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" name="photo" class="form-control-file" required>
                </div>
                <button class="btn btn-primary btn-block">Upload Foto</button>
            </form>
        </div>
    </div>
</div>
</body>
</html> 