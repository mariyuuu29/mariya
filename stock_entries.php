<!-- stock_entries.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Entry - Furniture Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8d7da;">

<div class="container mt-5">
    <div class="card border-danger">
        <div class="card-header bg-danger text-white text-center">
            Add Stock Entry
        </div>
        <div class="card-body">
            <form action="stock_process.php" method="POST">
                <div class="mb-3">
                    <label>Product ID</label>
                    <input type="number" name="product_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Stock Added</label>
                    <input type="number" name="stock_added" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Date Added</label>
                    <input type="date" name="date_added" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-danger w-100">Add Stock</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
