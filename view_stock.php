<?php
require('connection.php');
$result = mysqli_query($conn, "SELECT * FROM stock_entries");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white text-center"><h3>Stock Entries</h3></div>
        <div class="card-body">
            <table id="table" class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Stock ID</th><th>Product ID</th><th>Stock Added</th><th>Date Added</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $row['stock_id']; ?></td>
                            <td><?= $row['product_id']; ?></td>
                            <td><?= $row['stock_added']; ?></td>
                            <td><?= $row['date_added']; ?></td>
                            <td>
                                <a href="edit_stock.php?stock_id=<?= $row['stock_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_stock.php?stock_id=<?= $row['stock_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this stock entry?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script> $(document).ready(() => $('#table').DataTable()); </script>
</body>
</html>
