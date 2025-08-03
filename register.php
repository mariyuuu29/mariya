<?php
include("connect.php");
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);

   if (!empty($name) && !empty($address) && !empty($email) && !empty($phone) && !empty($aadhar)) {
      $sql = "INSERT INTO users (name, address, email, phone, aadhar) 
              VALUES ('$name', '$address', '$email', '$phone', '$aadhar')";

      if (mysqli_query($conn, $sql)) {
         $success = "Registration Successful!";
      } else {
         $error = "Error: " . mysqli_error($conn);
      }
   } else {
      $error = "Please fill all fields.";
   }
}
?>

<html>
<head>
   <title>Registration Form</title>
   <style>
      label { font-weight: bold; width: 100px; font-size: 14px; }
      .box { border: #666666 solid 1px; }
   </style>
</head>
<body bgcolor="#FFFFFF">
   <div align="center">
      <div style="width: 400px; border: solid 1px #333333;" align="left">
         <div style="background-color:#333333; color:#FFFFFF; padding: 3px;"><b>Register</b></div>
         <div style="margin: 30px">
            <form action="" method="post">
               <label>Name:</label><input type="text" name="name" class="box"/><br /><br />
               <label>Address:</label><input type="text" name="address" class="box"/><br /><br />
               <label>Email:</label><input type="email" name="email" class="box"/><br /><br />
               <label>Phone:</label><input type="text" name="phone" class="box"/><br /><br />
               <label>Aadhar:</label><input type="text" name="aadhar" class="box"/><br /><br />
               <input type="submit" value=" Register "/><br />
            </form>
            <div style="color: green;"><?php echo $success; ?></div>
            <div style="color: red;"><?php echo $error; ?></div>
         </div>
      </div>
   </div>
</body>
</html>
