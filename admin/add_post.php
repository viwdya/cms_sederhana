<?php include '../config/db.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $conn->query("INSERT INTO posts (title, content) VALUES ('$title', '$content')");
    header('Location: index.php');
}
?>
<form method="POST">
  <input type="text" name="title" placeholder="Judul"><br>
  <textarea name="content" placeholder="Isi konten"></textarea><br>
  <button type="submit">Simpan</button>
</form>