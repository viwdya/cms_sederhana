<?php include '../config/db.php'; ?>
<?php
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $conn->query("UPDATE posts SET title='$title', content='$content' WHERE id=$id");
    header('Location: index.php');
}
$post = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>
<form method="POST">
  <input type="text" name="title" value="<?= $post['title'] ?>"><br>
  <textarea name="content"><?= $post['content'] ?></textarea><br>
  <button type="submit">Update</button>
</form>