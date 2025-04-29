<?php
session_start();

 $correct_uname="admin";
 $correct_password="admin123";

 $uname=$_POST['uname'];
 $password=$_POST['password'];

 if( $correct_uname === $uname &&  $correct_password === $password )
 {
    $_SESSION['uname']=$uname;
    header("Location:secured.php");
    exit();
 }
 else{
    header("Location:login.php");
    exit();
 }
?>