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
    <th>Product Details</th>
    <?php
require('connection.php');

$sql = "SELECT product_id, product_name, category, price, stock FROM products";
 $result = mysqli_query($conn, $sql);

?>

<table id="userTable" class="display">
    <thead>
        <tr>
            <th>product_id</th>
            <th>product_name</th>
            <th>category</th>
            <th>price</th>
            <th>stock</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>". $row["product_id"] ."</td>
                        <td>". $row["product_name"] ."</td>
                        <td>". $row["category"] ."</td>
                        <td>". $row["price"] ."</td>
                        <td>". $row["stock"] ."</td>
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
