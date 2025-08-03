<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");
$id = intval($_GET['stock_id']);
$conn->query("DELETE FROM stock_entries WHERE stock_id = $id");
header("Location: view_stock.php");
?>