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
$course_id = $_GET['course_id'];
$duration = $_GET['duration'];
$fees = $_GET['fees'];
$sql = "INSERT INTO course_management(name,course_id,duration,fees)
        VALUES ('$name', '$course_id', '$duration', '$fees')";

if (mysqli_query($conn, $sql)) {
    echo "Course Added Successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>