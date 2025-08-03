<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");
$stock = null;

if (isset($_GET['stock_id'])) {
    $id = intval($_GET['stock_id']);
    $result = $conn->query("SELECT * FROM stock_entries WHERE stock_id = $id");
    if ($result->num_rows > 0) {
        $stock = $result->fetch_assoc();
    } else {
        die("❌ Stock Entry not found");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['stock_id']);
    $product_id = $_POST['product_id'];
    $stock_added = $_POST['stock_added'];
    $date_added = $_POST['date_added'];

    $update = $conn->query("UPDATE stock_entries SET 
        product_id='$product_id', 
        stock_added='$stock_added', 
        date_added='$date_added' 
        WHERE stock_id = $id");

    if ($update) {
        header("Location: view_stock.php");
        exit;
    } else {
        echo "❌ Error updating: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Stock Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark text-center">
            <h3>Edit Stock Entry</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="stock_id" value="<?= $stock['stock_id'] ?>">
                <div class="mb-3"><label>Product ID</label><input type="text" name="product_id" class="form-control" value="<?= $stock['product_id'] ?>" required></div>
                <div class="mb-3"><label>Stock Added</label><input type="number" name="stock_added" class="form-control" value="<?= $stock['stock_added'] ?>" required></div>
                <div class="mb-3"><label>Date Added</label><input type="date" name="date_added" class="form-control" value="<?= $stock['date_added'] ?>" required></div>
                <button type="submit" class="btn btn-warning w-100">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
