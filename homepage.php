<?php  session_start(); 
require_once("Massege/success_log.php");
$_SESSION['success_logout'] = 'You have successfully logged out!';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello <?php echo  $_SESSION['name'] ; ?> </h1>
    <a href="logout.php">logout</a>
</body>
</html>