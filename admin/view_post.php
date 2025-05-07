<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
include '../config/db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$post = $conn->query("SELECT * FROM posts WHERE id = $id")->fetch_assoc();
if (!$post) {
    echo "<div class='alert alert-danger'>Postingan tidak ditemukan.</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($post['title']) ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* Hanya elemen utama/fokus yang ungu */
    .btn-primary,
    .btn-primary:active,
    .btn-primary:focus,
    .btn-primary:hover,
    .nav-pills .nav-link.active,
    .bg-primary,
    .card-primary.card-outline,
    .alert-primary,
    .border-primary {
        background-color: #8000ff !important;
        border-color: #8000ff !important;
    }
    a,
    a:hover,
    a:focus,
    a:active {
        color: #8000ff;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include 'navbar.php'; ?>
  <?php include 'sidebar.php'; ?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid mt-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?= htmlspecialchars($post['title']) ?></h3>
            <a href="index.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="card-body">
            <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</body>
</html> 