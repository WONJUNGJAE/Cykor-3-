<?php session_start();
$db = mysqli_connect('mysql', 'Cykor_user', 'Cykor_pass', 'Cykor_assignment_db');
$postid = $_GET['postid'];
$query = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id=users.id WHERE posts.id=$postid";
$result = mysqli_query($db, $query);
$post = mysqli_fetch_assoc($result);
if ($post):
?>
<a href="home.php">home</a> <a href="write.php">write</a> <a href="list.php">list</a> <a href="logout.php">logout</a>
<h1><?= $post['title'] ?></h1>
<p>By <?= $post['username'] ?></p>
<p><?= nl2br($post['content']) ?></p>
<p style="background:#b3d1ff;display:inline-block;">Created at: <?= $post['created_at'] ?></p>
<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
  <br><a href="edit.php?postid=<?= $post['id'] ?>">Edit</a>
  <a href="delete.php?postid=<?= $post['id'] ?>">Delete</a>
<?php endif; ?>
<?php else: ?>
게시글이 존재하지 않습니다.
<?php endif;
mysqli_close($db); ?>
