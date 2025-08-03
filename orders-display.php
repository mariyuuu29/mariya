<!DOCTYPE html>
<html>
<head>
    <title>MySQL Data in DataTable</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <th>order Details</th>
    <?php
require('connection.php');

$sql = "SELECT order_id, product_id, customer_id, quantity, order_date, total_price FROM orders";
 $result = mysqli_query($conn, $sql);

?>

<table id="userTable" class="display">
    <thead>
        <tr>
            <th>order_id</th>
            <th>product_id</th>
            <th>customer_id</th>
            <th>quantity</th>
            <th>order_date</th>
            <th>total_price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>". $row["order_id"] ."</td>
                        <td>". $row["product_id"] ."</td>
                        <td>". $row["customer_id"] ."</td>
                        <td>". $row["quantity"] ."</td>
                        <td>". $row["order_date"] ."</td>
                        <td>". $row["total_price"] ."</td>
                      </tr>";
            }
        }
        ?>
    </tbody>
</table>


    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>

</body>
</html>
