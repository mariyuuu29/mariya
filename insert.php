<?php
$server="localhost";
$user="root";
$password="";
$db="v2v";
$conn = mysqli_connect($server, $user, $password,$db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$name = $_GET['fname'];
$phone=$_GET['phone'];
$email=$_GET['email'];
$add=$_GET['address'];
$gender=$_GET['gender'];
$course=$_GET['course']
if (mysqli_query($c 9onn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
}
mysqli_close($conn);
?> 