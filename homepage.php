<?php
//The beginning of the session
session_start();
//Call login message
require_once("Massege/success_log.php");
//Logout message
$_SESSION['success_logout'] = 'You have successfully logged out!';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
</head>
<body>
<!-- Welcome the user -->
    <h1>Hello <?php echo  $_SESSION['name'] ; ?> </h1>
<!-- Logout and end session link -->
    <a href="logout.php">logout</a>
</body>
</html>