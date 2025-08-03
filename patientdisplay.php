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
    <th>Patients Details</th>
    <?php
require('connection.php');

$sql = "SELECT patient_id, name, age, gender, phone, symptoms FROM patient_records";
 $result = mysqli_query($conn, $sql);

?>

<table id="userTable" class="display">
    <thead>
        <tr>
            <th>patient_id</th>
            <th>Name</th>
            <th>age</th>
            <th>gender</th>
            <th>Phone</th>
            <th>symptoms</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>". $row["patient_id"] ."</td>
                        <td>". $row["name"] ."</td>
                        <td>". $row["age"] ."</td>
                        <td>". $row["gender"] ."</td>
                        <td>". $row["phone"] ."</td>
                        <td>". $row["symptoms"] ."</td>
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
