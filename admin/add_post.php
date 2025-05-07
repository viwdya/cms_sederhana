<?php
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

  <!-- AdminLTE & Bootstrap via CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php if (file_exists('navbar.php')) include 'navbar.php'; ?>

  <!-- Sidebar -->
  <?php if (file_exists('sidebar.php')) include 'sidebar.php'; ?>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <h1 class="m-0">Tambah Postingan</h1>
        <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="content" class="form-label">Isi</label>
                <textarea name="content" id="content" class="form-control" rows="6" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0/dist/js/adminlte.min.js"></script>
</body>
</html>
