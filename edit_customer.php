<?php
$conn = new mysqli("localhost", "root", "", "furniture_company");
$customer = null;

if (isset($_GET['customer_id'])) {
    $id = intval($_GET['customer_id']);
    $result = $conn->query("SELECT * FROM customers ");
    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    } else {
        die("❌ Customer not found");
    }
}

// Update logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['customer_id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    $update = $conn->query("UPDATE customers SET 
        name='$name', 
        email='$email', 
        phone='$phone', 
        address='$address', 
        city='$city', 
        pincode='$pincode' 
        WHERE customer_id = $id");

    if ($update) {
        header("Location: view_customers.php");
        exit;
    } else {
        echo "❌ Error updating: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark text-center">
            <h3>Edit Customer Details</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" name="customer_id" value="<?= $customer['customer_id'] ?>">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $customer['name'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $customer['email'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= $customer['phone'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="<?= $customer['address'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="<?= $customer['city'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pincode</label>
                    <input type="text" name="pincode" class="form-control" value="<?= $customer['pincode'] ?>" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
