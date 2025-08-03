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
    <th>Stock Details</th>
    <?php
require('connection.php');

$sql = "SELECT stock_id, product_id, stock_added, date_added FROM stock_entries";
 $result = mysqli_query($conn, $sql);

?>

<table id="userTable" class="display">
    <thead>
        <tr>
            <th>stock_id</th>
            <th>product_id</th>
            <th>stock_added</th>
            <th>date_added</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>". $row["stock_id"] ."</td>
                        <td>". $row["product_id"] ."</td>
                        <td>". $row["stock_added"] ."</td>
                        <td>". $row["date_added"] ."</td>
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
s