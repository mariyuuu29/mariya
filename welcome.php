<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
}
?>

<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome <?php echo $_SESSION['login_user']; ?>!</h2>
    <h2><a href="login.php">Sign Out</a></h2>
</body>
</html>