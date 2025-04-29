<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'database_handling.php';
    $conn = connect_db();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    $stmt->execute();

    echo "<p>Registered successfully! <a href='login.php'>Login here</a>.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reg</title>
</head>
<body>
<form method="POST">
  Name: <input name="name" required><br>
  Email: <input name="email" type="email" required><br>
  Password: <input name="password" type="password" required><br>
  <button type="submit">Register</button>
</form>
</body>
</html>

