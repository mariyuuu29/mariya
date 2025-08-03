<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $delivery_address = $_POST['delivery_address'];
    $delivery_date = $_POST['delivery_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO deliveries (order_id, delivery_address, delivery_date, status) 
            VALUES ('$order_id', '$delivery_address', '$delivery_date', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "Delivery Recorded Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
 }
}
?>