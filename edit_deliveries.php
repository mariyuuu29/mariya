<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");
$delivery = null;

if (isset($_GET['delivery_id'])) {
    $id = intval($_GET['delivery_id']);
    $result = $conn->query("SELECT * FROM deliveries WHERE delivery_id = $id");
    if ($result->num_rows > 0) {
        $delivery = $result->fetch_assoc();
    } else {
        die("❌ Delivery not found");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['delivery_id']);
    $order_id = $_POST['order_id'];
    $delivery_address = $_POST['delivery_address'];
    $delivery_date = $_POST['delivery_date'];
    $status = $_POST['status'];

    $update = $conn->query("UPDATE deliveries SET 
        order_id='$order_id', 
        delivery_address='$delivery_address', 
        delivery_date='$delivery_date', 
        status='$status' 
        WHERE delivery_id = $id");

    if ($update) {
        header("Location: view_deliveries.php");
        exit;
    } else {
        echo "❌ Error updating: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Delivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark text-center">
            <h3>Edit Delivery Details</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="delivery_id" value="<?= $delivery['delivery_id'] ?>">
                <div class="mb-3"><label>Order ID</label><input type="text" name="order_id" class="form-control" value="<?= $delivery['order_id'] ?>" required></div>
                <div class="mb-3"><label>Delivery Address</label><input type="text" name="delivery_address" class="form-control" value="<?= $delivery['delivery_address'] ?>" required></div>
                <div class="mb-3"><label>Delivery Date</label><input type="date" name="delivery_date" class="form-control" value="<?= $delivery['delivery_date'] ?>" required></div>
                <div class="mb-3"><label>Status</label><input type="text" name="status" class="form-control" value="<?= $delivery['status'] ?>" required></div>
                <button type="submit" class="btn btn-warning w-100">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
