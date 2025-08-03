<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "v2v";
$conn = mysqli_connect($server, $user, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_GET['name'];
$id = $_GET['id'];
$address = $_GET['address'];
$phone = $_GET['phone'];
$sql = "INSERT INTO employe(name,id,address, phone)
        VALUES ('$name', '$id', '$address', '$phone')";

if (mysqli_query($conn, $sql)) {
    echo "Employee Added Successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>