<?php  
$conn = new mysqli("localhost", "root", "", "furniture_company");  

$order = null;  

if (isset($_GET['order_id'])) {  
    $order_id = intval($_GET['order_id']);  
    $result = $conn->query("SELECT * FROM orders WHERE order_id = $order_id");  
    if ($result->num_rows > 0) {  
        $order = $result->fetch_assoc();  
    } else {  
        die("❌ Order not found.");  
    }  
}  

// Update Logic  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    $order_id = intval($_POST['order_id']);  
    $customer_id = intval($_POST['customer_id']);  
    $product_id = intval($_POST['product_id']);  
    $quantity = intval($_POST['quantity']);  
    $order_date = $_POST['order_date'];  
    $total_price = floatval($_POST['total_price']);  

    // Check Foreign Keys  
    $checkCustomer = $conn->query("SELECT * FROM customers WHERE customer_id = $customer_id");  
    $checkProduct = $conn->query("SELECT * FROM products WHERE product_id = $product_id");  

    if ($checkCustomer->num_rows > 0 && $checkProduct->num_rows > 0) {  
        $update = $conn->query("UPDATE orders SET   
            customer_id = '$customer_id',   
            product_id = '$product_id',   
            quantity = '$quantity',   
            order_date = '$order_date',   
            total_price = '$total_price'   
            WHERE order_id = $order_id  
        ");  
        if ($update) {  
            header("Location: view_orders.php");  
            exit;  
        } else {  
            echo "❌ Error updating order: " . $conn->error;  
        }  
    } else {  
        echo "❌ Invalid Customer ID or Product ID!";  
    }  
}  
?>  

<!DOCTYPE html>  
<html>  
<head>  
    <title>Edit Order</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body class="bg-light">  

<div class="container mt-5">  
    <div class="card shadow">  
        <div class="card-header bg-primary text-white text-center">  
            <h3>Edit Order Details</h3>  
        </div>  
        <div class="card-body">  
            <form method="POST">  
                <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">  
                <div class="mb-3">  
                    <label class="form-label">Customer ID</label>  
                    <input type="number" name="customer_id" class="form-control" value="<?= $order['customer_id'] ?>" required>  
                </div>  
                <div class="mb-3">  
                    <label class="form-label">Product ID</label>  
                    <input type="number" name="product_id" class="form-control" value="<?= $order['product_id'] ?>" required>  
                </div>  
                <div class="mb-3">  
                    <label class="form-label">Quantity</label>  
                    <input type="number" name="quantity" class="form-control" value="<?= $order['quantity'] ?>" required>  
                </div>  
                <div class="mb-3">  
                    <label class="form-label">Order Date</label>  
                    <input type="date" name="order_date" class="form-control" value="<?= $order['order_date'] ?>" required>  
                </div>  
                <div class="mb-3">  
                    <label class="form-label">Total Price</label>  
                    <input type="number" step="0.01" name="total_price" class="form-control" value="<?= $order['total_price'] ?>" required>  
                </div>  
                <button type="submit" class="btn btn-primary w-100">Update Order</button>  
            </form>  
        </div>  
    </div>  
</div>  

</body>
</html>
