<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'database_handling.php';
    $conn = connect_db();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hash);
    $stmt->fetch();

    if (password_verify($password, $hash)) {
        $_SESSION['user_id'] = $id;
        header("Location: o.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
  Email: <input name="email" required><br>
  Password: <input name="password" type="password" required><br>
  <button type="submit">Login</button>
</form>
</body>
</html>