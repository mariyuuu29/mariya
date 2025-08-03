<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $order_date = $_POST['order_date'];
    $total_price = $_POST['total_price'];

    $sql = "INSERT INTO orders (customer_id, product_id, quantity, order_date, total_price) 
            VALUES ('$customer_id', '$product_id', '$quantity', '$order_date', '$total_price')";

    if (mysqli_query($conn, $sql)) {
        echo "Order Placed Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
 }
}
?>