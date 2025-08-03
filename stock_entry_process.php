<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $stock_added = $_POST['stock_added'];
    $date_added = $_POST['date_added'];

    $sql = "INSERT INTO stock_entries (product_id, stock_added, date_added) 
            VALUES ('$product_id', '$stock_added', '$date_added')";

    if (mysqli_query($conn, $sql)) {
        echo "Stock Entry Recorded Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
 }
}
?>