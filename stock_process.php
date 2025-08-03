<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = $_POST['product_id'];
$stock_added = $_POST['stock_added'];
$date_added = $_POST['date_added'];

$conn->query("INSERT INTO stock_entries (product_id, stock_added, date_added) 
              VALUES ('$product_id', '$stock_added', '$date_added')");

header("Location: view_stock.php");
?>