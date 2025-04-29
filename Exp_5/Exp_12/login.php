<?php
session_start();
if(isset($_SESSION["uname"])){
    header("Location: secured.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
</head>
 <body>
        <form action="login_process.php" method="POST">
        <label for="uname">User Name: </label>
            <input type="text" name="uname"  required>
        <br><br>

        <label  for="Password" >Password : </label>
            <input type="password" name="password" required>
            <br><br>
        <input type ="Submit" value="Login">
</form>
    </body>
</html>