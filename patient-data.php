<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "v2v";
$conn = mysqli_connect($server, $user, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$patient_id = $_GET['patient_id'];
$name = $_GET['name'];
$age = $_GET['age'];
$gender = $_GET['gender'];
$phone = $_GET['phone'];
$symptoms = $_GET['symptoms'];
$sql = "INSERT INTO patient_records(patient_id,name,age,gender,phone,symptoms)
        VALUES ('$patient_id', '$name', '$age', '$gender','$phone','$symptoms')";

if (mysqli_query($conn, $sql)) {
    echo "Patient Record Added Successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
