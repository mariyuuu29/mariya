<?php
include("connect.php");
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $order_date = date('Y-m-d');
    $total_amount = $_POST['total_amount'];

    $sql = "INSERT INTO orders (customer_id, order_date, total_amount)
            VALUES ('$customer_id', '$order_date', '$total_amount')";
    
    if (mysqli_query($conn, $sql)) {
        $msg = "Order Placed Successfully!";
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}
?>

<form method="post">
    <h3>Place Order</h3>
    Customer ID: <input type="number" name="customer_id"><br>
    Total Amount: <input type="number" name="total_amount" step="0.01"><br>
    <input type="submit" value="Place Order"><br>
    <p><?php echo $msg;?></p>
</form>
