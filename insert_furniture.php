<?php
$server="localhost";
$user="root";
$password="";
$db="v2v";
$conn = mysqli_connect($server, $user, $password,$db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$iname = $_GET['iname'];
$iprice = $_GET['iprice'];
$sql = "INSERT INTO furniture_items(item_name, item_price)
        VALUES ('$iname', '$iprice')";
if (mysqli_query($conn, $sql)) {
  echo "Furniture Item Added successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>