<!-- deliveries.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Entry - Furniture Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #d4edda;">

<div class="container mt-5">
    <div class="card border-success">
        <div class="card-header bg-success text-white text-center">
            Delivery Details Entry
        </div>
        <div class="card-body">
            <form action="delivery_process.php" method="POST">
                <div class="mb-3">
                    <label>Order ID</label>
                    <input type="number" name="order_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Delivery Address</label>
                    <input type="text" name="delivery_address" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Delivery Date</label>
                    <input type="date" name="delivery_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option>Pending</option>
                        <option>Delivered</option>
                        <option>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Submit Delivery</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
