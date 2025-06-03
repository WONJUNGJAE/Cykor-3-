<?php session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $db = mysqli_connect('mysql', 'Cykor_user', 'Cykor_pass', 'Cykor_assignment_db');
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT id, password FROM users WHERE username = '$username'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($result);
  if ($row && password_verify($password, $row['password'])) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $username;
    mysqli_close($db);
    header("Location: home.php");
    exit;
  } else {
    echo "로그인 실패";
  }
  mysqli_close($db);
}
?>
<a href="home.php">home</a> <a href="register.php">register</a> <a href="login.php">login</a>
<h1>login</h1>
<form method="POST">
  <input name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <button type="submit">Login</button>
</form>
