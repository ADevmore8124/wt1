<?php 
include('db_handling.php');

if($_SERVER['REQUEST_METHOD']="POST" && isset($_POST['customer_submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $Phone=$_POST['phone'];
    $address=POST['address'];

    $customer_id = addCustomer($name,$email,$phone,$address);
    header("Location :" . $_customer_id);
    exit();
}
?>
<!DOCTYPE html>
<html >
<head>
    <title>Restaurant Order Booking </title>
</head>
<body>
    <h1>Customer Details</h1>
    <form action="index.php" method="POST">
    <label for="name" > Name : </label>
    <input type="text" name="name" required ><br><br>

    <label for="email" > Email : </label>
    <input type="email" name="email" required ><br><br>

    <label for="phone" >Phone : </label>
    <input type="text" name="phone" required ><br><br>

    <label for="address" > Address : </label>
    <textarea name="address" required > </textarea> <br><br>

    <input type="submit" name ="customer_submit" value="Submit">
</form>
</body>
</html>