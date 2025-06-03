<?php session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = mysqli_connect('mysql', 'Cykor_user', 'Cykor_pass', 'Cykor_assignment_db');
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  mysqli_query($db, $query);
  mysqli_close($db);
  header("Location: login.php");
  exit;
}
?>
<a href="home.php">home</a> <a href="register.php">register</a> <a href="login.php">login</a>
<h1>register</h1>
<form method="POST">
  <input name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <button type="submit">Register</button>
</form>
