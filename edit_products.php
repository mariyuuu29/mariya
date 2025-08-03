<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");
$product = null;

if (isset($_GET['product_id'])) {
    $id = intval($_GET['product_id']);
    $result = $conn->query("SELECT * FROM products WHERE product_id = $id");
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        die("❌ Product not found");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['product_id']);
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $update = $conn->query("UPDATE products SET 
        product_name='$name', 
        category='$category', 
        price='$price', 
        stock='$stock' 
        WHERE product_id = $id");

    if ($update) {
        header("Location: view_products.php");
        exit;
    } else {
        echo "❌ Error updating: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark text-center">
            <h3>Edit Product Details</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                <div class="mb-3"><label class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control" value="<?= $product['product_name'] ?>" required></div>
                <div class="mb-3"><label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" value="<?= $product['category'] ?>" required></div>
                <div class="mb-3"><label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required></div>
                <div class="mb-3"><label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="<?= $product['stock'] ?>" required></div>
                <button type="submit" class="btn btn-warning w-100">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
