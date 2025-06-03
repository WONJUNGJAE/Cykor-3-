<?php session_start(); ?>
<a href="home.php">home</a>
<?php if (isset($_SESSION['user_id'])): ?>
  <a href="write.php">write</a>
  <a href="list.php">list</a>
  <a href="logout.php">logout</a>
<?php else: ?>
  <a href="register.php">register</a>
  <a href="login.php">login</a>
<?php endif; ?>
<h1>home</h1>
