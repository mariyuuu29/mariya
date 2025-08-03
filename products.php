<!-- products.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Furniture Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #e3f2fd;">

<div class="container mt-5">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white text-center">
            Add New Product
        </div>
        <div class="card-body">
            <form action="product_process.php" method="POST">
                <div class="mb-3">
                    <label>Product Name</label>
                    <input type="text" name="product_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Price (₹)</label>
                    <input type="number" name="price" step="0.01" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Stock Quantity</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Product</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
