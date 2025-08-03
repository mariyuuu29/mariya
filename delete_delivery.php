<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");
$id = intval($_GET['delivery_id']);
$conn->query("DELETE FROM deliveries WHERE delivery_id = $id");
header("Location: view_deliveries.php");
?>