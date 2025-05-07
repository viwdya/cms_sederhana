<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];

  $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
  $stmt->bind_param("ss", $title, $content);
  $stmt->execute();

  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Postingan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- AdminLTE v3.2.0 & Bootstrap 4 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* Pastikan tidak ada override font-size sidebar */
    .main-sidebar, .nav-sidebar .nav-link, .sidebar .user-panel, .sidebar .nav-header {
      font-size: 1rem !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>
  <!-- Sidebar -->
  <?php include 'sidebar.php'; ?>
  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card card-primary card-outline mt-4">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus"></i> Tambah Postingan</h3>
                <a href="index.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
              </div>
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="judul"><i class="fas fa-heading"></i> Judul</label>
                    <input type="text" class="form-control" id="judul" name="title" placeholder="Masukkan judul postingan" required>
                  </div>
                  <div class="form-group">
                    <label for="isi"><i class="fas fa-align-left"></i> Isi</label>
                    <textarea class="form-control" id="isi" name="content" rows="6" placeholder="Tulis isi postingan..." required></textarea>
                  </div>
                  <!-- Jika ingin upload gambar:
                  <div class="form-group">
                    <label for="gambar"><i class="fas fa-image"></i> Gambar (opsional)</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                  </div>
                  -->
                </div>
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                  <a href="index.php" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
