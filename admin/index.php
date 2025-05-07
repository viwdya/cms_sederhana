<?php include '../config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include 'navbar.php'; ?>
  <?php include 'sidebar.php'; ?>
  <div class="content-wrapper">
    <div class="content-header">
      <h1>Daftar Postingan</h1>
      <a href="add_post.php" class="btn btn-primary">Tambah Postingan</a>
    </div>
    <div class="content">
      <table class="table">
        <thead><tr><th>Judul</th><th>Aksi</th></tr></thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['title']}</td>
                  <td><a href='edit_post.php?id={$row['id']}'>Edit</a> |
                      <a href='delete_post.php?id={$row['id']}'>Hapus</a></td></tr>";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>