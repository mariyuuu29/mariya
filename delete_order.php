<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");
$id = intval($_GET['order_id']);
$conn->query("DELETE FROM orders WHERE order_id = $id");
header("Location: view_orders.php");
?>