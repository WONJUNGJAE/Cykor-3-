<?php session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
$db = mysqli_connect('mysql', 'Cykor_user', 'Cykor_pass', 'Cykor_assignment_db');
$postid = $_GET['postid'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $user_id = $_SESSION['user_id'];
  $query = "UPDATE posts SET title='$title', content='$content' WHERE id=$postid AND user_id=$user_id";
  mysqli_query($db, $query);
  mysqli_close($db);
  header("Location: read.php?postid=$postid");
  exit;
}
$query = "SELECT title, content FROM posts WHERE id=$postid AND user_id={$_SESSION['user_id']}";
$result = mysqli_query($db, $query);
$post = mysqli_fetch_assoc($result);
if ($post):
?>
<a href="home.php">home</a> <a href="write.php">write</a> <a href="list.php">list</a> <a href="logout.php">logout</a>
<h1>edit</h1>
<form method="POST">
  <input name="title" value="<?= $post['title'] ?>">
  <textarea name="content"><?= $post['content'] ?></textarea>
  <button type="submit">Update</button>
</form>
<?php else: ?>
권한 없음
<?php endif;
mysqli_close($db); ?>
