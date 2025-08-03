<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO products (product_name, category, price, stock) VALUES ('$pname', '$category', '$price', '$stock')";

    if (mysqli_query($conn, $sql)) {
        echo "Product Added Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
 }
}
?>