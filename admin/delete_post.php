<?php include '../config/db.php'; ?>
<?php
$id = $_GET['id'];
$conn->query("DELETE FROM posts WHERE id=$id");
header('Location: index.php');
?>