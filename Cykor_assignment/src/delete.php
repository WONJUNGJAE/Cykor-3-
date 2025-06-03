<?php session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
$db = mysqli_connect('mysql', 'Cykor_user', 'Cykor_pass', 'Cykor_assignment_db');
$postid = $_GET['postid'];
$user_id = $_SESSION['user_id'];
$query = "DELETE FROM posts WHERE id=$postid AND user_id=$user_id";
mysqli_query($db, $query);
mysqli_close($db);
header("Location: list.php");
exit;
