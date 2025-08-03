<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");
$id = intval($_GET['customer_id']);
$conn->query("DELETE FROM customers WHERE customer_id = $id");
header("Location: view_customers.php");
?>