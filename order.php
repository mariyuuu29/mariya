<!-- orders.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order - Furniture Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #fff3cd;">

<div class="container mt-5">
    <div class="card border-warning">
        <div class="card-header bg-warning text-white text-center">
            Place New Order
        </div>
        <div class="card-body">
            <form action="order_process.php" method="POST">
                <div class="mb-3">
                    <label>Customer ID</label>
                    <input type="number" name="customer_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Product ID</label>
                    <input type="number" name="product_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Order Date</label>
                    <input type="date" name="order_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Total Price (₹)</label>
                    <input type="number" name="total_price" step="0.01" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Place Order</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
