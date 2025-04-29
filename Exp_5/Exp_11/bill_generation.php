<?php
include('db_handling.php');

if(!isset($_GET['order_id'])){
    echo "No Order Id  Provided !";
    exit();
}

$order_id = $_GET['order_id'];
$order_details =  getOrderDetails('order_id');
$total_amount = 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Bill</title>
</head>
<body>
    <h2>Order Bill</h2>
    <table border="1">
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
         <?php while($row=$order_details->fetch_assoc()) { ?>
        
        <tr>
            <td><?php  echo $row['item_name'] ;?></td>
            <td><?php  echo $row['quabtity'] ;?></td>
            <td><?php  echo $row['price'] ;?></td>
            <td><?php  echo $row['total_item_price'] ;?></td>
        </tr>
           
        <?php $total_amount += $row['total_item_price'];?>
   <?php  } ?>

         
        </table>
        <h3>Total Amount: <?php echo $total_amount; ?></h3>
    </body>
    </html>
