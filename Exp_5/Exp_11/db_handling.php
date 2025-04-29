<?php
$servername="localhost";
$username="root";
$password="";
$dbname="restaurant";

$Conn= new mysqli($servername,$username,$password,$dbname);

if($Conn->connect_error)
{
    die("Connection failed :" .$Conn->connect_error);
}


function addCustomer($name,$email,$phone,$address){
    global $Conn;
    $stat = $Conn->prepare("INSERT INTO customer(name, email , phone ,address) VALUES (?,?,?,?)");
    $stat ->bind_param("ssss", $name,$email,$phone,$address);
    $stat->execute();
    return $Conn->insert_id;
}

function createOrder($customer_id,$total_amount){
    global $Conn;
    $stat = $Conn->prepare("INSERT INTO orders(customer_id,total_amount) VALUES (?,?)");
    $stat->bind_param("id",$customer_id,$total_amount);
    $stat->execute();
}

function addOrderItem($order_id,$item_name,$quantity,$price){
    global $Conn;
    $stat= $Conn->prepare("INSERT INTO order_items (order_id,item_name,quantity,price) VALUES(?,?,?,?)");
    $stat->bind_param("isid",$order_id,$item_name,$quantity,$price);
    $stat->execute();
}

function getOrderDetails($order_id){
    global $Conn;
    $sql = "SELECT o.order_id ,o.order_date, oi.item_name, oi.quantity, oi.price, (oi.quantity*oi.price) as Total_item_price 
           FROM orders o 
           JOIN order_items oi on o.order_id = oi.order_id
           WHERE o.order_id=?";
    $stat= $Conn->prepare($sql);
    $stat->bind_param("i",$order_id);
    $stat->execute();
    return $stat->get_result();
}
?>