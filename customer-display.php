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
    <th>Customers Details</th>
    <?php
require('connection.php');

$sql = "SELECT customer_id, name, email, phone, address, city, pincode FROM customers";
 $result = mysqli_query($conn, $sql);

?>

<table id="userTable" class="display">
    <thead>
        <tr>
            <th>customer_id</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>address</th>
            <th>city</th>
            <th>pincode</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>". $row["customer_id"] ."</td>
                        <td>". $row["name"] ."</td>
                        <td>". $row["email"] ."</td>
                        <td>". $row["phone"] ."</td>
                        <td>". $row["address"] ."</td>
                        <td>". $row["city"] ."</td>
                        <td>". $row["pincode"] ."</td>
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
