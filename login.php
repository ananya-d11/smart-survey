<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username = ?");
  $stmt->bind_param("s", $user);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($row = $result->fetch_assoc()) {
    if (password_verify($pass, $row['password'])) {
      $_SESSION['admin'] = $user;
      header("Location: dashboard.php");
    } else {
      echo "Invalid credentials";
    }
  } else {
    echo "User not found";
  }
}
?>
<form method="POST">
  <input name="username" placeholder="Username" required><br>
  <input name="password" type="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>
