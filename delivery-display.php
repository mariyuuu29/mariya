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
    <th>Delivery Details</th>
    <?php
require('connection.php');

$sql = "SELECT delivery_id, order_id, delivery_address, delivery_date, status FROM deliveries";
 $result = mysqli_query($conn, $sql);

?>

<table id="userTable" class="display">
    <thead>
        <tr>
            <th>delivery_id</th>
            <th>order_id</th>
            <th>delivery_address</th>
            <th>delivery_date</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>". $row["delivery_id"] ."</td>
                        <td>". $row["order_id"] ."</td>
                        <td>". $row["delivery_address"] ."</td>
                        <td>". $row["delivery_date"] ."</td>
                        <td>". $row["status"] ."</td>
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
