<?php
include('db_handling.php');

if(!isset($_GET['customer_id'])){
    echo "No Customer Id Provided";
    exit();
}

$customer_id=$_GET['customer_id'];

if($_SERVER['REQUEST_METHOD']= 'POST' && $_POST['order_submit']){
    $total_amount=0;
    $order_id=create_order($customer_id,$total_amount);

    foreach($_POST['item_name'] as $key=>$item_name){
        $quantity=$POST['quantitty']['key'];
        $price =$POST['price']['key'];
        $total_amount += $quantity*$price ;
        addOrderItem($order_id,$item_name,$quantity,$total_amount)
    }

    $conn->query("UPDATE orders SET total_amount=$total_amount WHERE order_id=$order_id");

    header("Location : bill.php?order_id=" .$order_id);
    exit();
 
}
?>

<html>
    <head>
    <head>
    <body>
        <form action="order.php" method="POST">

        <label for="item_name[]"> Item Name : </label>
        <input type="text" name="item_name[]" required><br><br>

        <label for="quantity[]"> Quantity : </label>
        <input type="number" name="quantity[]" required><br><br>

        <label for="price[]"> Price : </label>
        <input type="number" name="price[]" required><br><br>

        <div>
            <button tyoe="button"  onclick="addItem">Add Item </button><br><br>

            <input type="submit name="order_submit" value="place_order">
</div>
</form>

<script>
function addItem(){
    const itemsDiv=document.getElementById('items');
    const  newItem=document.createElement('div');
    newItem.innerHTML=
    <label for="item_name[]"> Item Name : </label>
        <input type="text" name="item_name[]" required><br><br>

        <label for="quantity[]"> Quantity : </label>
        <input type="number" name="quantity[]" required><br><br>

        <label for="price[]"> Price : </label>
        <input type="number" name="price[]" required><br><br>
        ;
        itemsDiv.appendChild(newItem);
}
</script>
    </body>
</html>