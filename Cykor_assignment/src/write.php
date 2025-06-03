<?php session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = mysqli_connect('mysql', 'Cykor_user', 'Cykor_pass', 'Cykor_assignment_db');
  $title = $_POST['title'];
  $content = $_POST['content'];
  $user_id = $_SESSION['user_id'];
  $query = "INSERT INTO posts (title, content, user_id) VALUES ('$title', '$content', $user_id)";
  mysqli_query($db, $query);
  mysqli_close($db);
  header("Location: list.php");
  exit;
}
?>
<a href="home.php">home</a> <a href="write.php">write</a> <a href="list.php">list</a> <a href="logout.php">logout</a>
<h1>write</h1>
<form method="POST">
  <input name="title" placeholder="Title">
  <textarea name="content" placeholder="Content"></textarea>
  <button type="submit">Submit</button>
</form>
