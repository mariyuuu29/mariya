<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");
$id = intval($_GET['product_id']);
$conn->query("DELETE FROM products WHERE product_id = $id");
header("Location: view_products.php");
?>