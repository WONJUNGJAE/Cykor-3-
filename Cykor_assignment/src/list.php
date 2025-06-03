<?php session_start();
$db = mysqli_connect('mysql', 'Cykor_user', 'Cykor_pass', 'Cykor_assignment_db');
$query = "SELECT id, title FROM posts ORDER BY created_at DESC";
$result = mysqli_query($db, $query);
?>
<a href="home.php">home</a> <a href="write.php">write</a> <a href="list.php">list</a> <a href="logout.php">logout</a>
<h1>list</h1>
<ul>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
  <li><a href="read.php?postid=<?= $row['id'] ?>"><?= $row['title'] ?></a></li>
<?php endwhile; ?>
</ul>
<?php mysqli_close($db); ?>
