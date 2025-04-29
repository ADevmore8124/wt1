<?php
session_start();

if(!isset($_SESSION['uname'])){
    header("Location:login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secured Page</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['uname'];?>!</h1>
    <h2>This is Secured Page.</h2>

    <a href="logout_process.php">Logout</a>
</body>
</html>