<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>CMS Sederhana</title>
</head>
<body>
  <h1>Daftar Postingan</h1>
  <?php
  $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
  while ($row = $result->fetch_assoc()) {
      echo "<h2>{$row['title']}</h2><p>{$row['content']}</p><hr>";
  }
  ?>