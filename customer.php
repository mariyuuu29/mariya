<?php
$server="localhost";
$user="root";
$password="";
$db="v2v";
$conn = mysqli_connect($server, $user, $password,$db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO customer(name,address,email,phone,registration_date)
VALUES ('Aina', 'Mumbai','ayna13@gmail.com','6867867564','01-07-2025')";
$sql = "INSERT INTO customer(name,address,email,phone,registration_date)
VALUES ('Alia', 'Thane','alia8@gmail.com','98978674534','17-09-2022')";
if (mysqli_query($conn, $sql)) {
  echo "Customer record inserted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>