<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);

    $sql = "INSERT INTO customers (name, email, phone, address, city, pincode) 
            VALUES ('$name', '$email', '$phone', '$address', '$city', '$pincode')";

    if (mysqli_query($conn, $sql)) {
        echo "Customer Registered Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
 }
}
?>