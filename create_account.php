<?php 
// The beginning of the session
session_start();
// User registration success message
$_SESSION['success_reg'] = 'User registered successfully!';
// contact the database
class MyDB extends SQLite3 {
    function __construct() {
        $this->open('ZS.db');
    }
}
$db = new MyDB();
if(!$db) {
    echo $db->lastErrorMsg();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link to CSS file -->
    <link rel="stylesheet" href="CSS/log.css">
    <title>create account</title>
</head>
<body>
    <div class="login-box">
<h2>Create Account</h2>
<form method="POST">
    <div class="user-box">
    <input type="text" name="Name" required>
    <label>Name</label>
    </div>
    <div class="user-box">
    <input type="Email" name="Email" required>
    <label>Email</label>
    </div>
    <div class="user-box">
    <input type="Phone" name="Phone" required>
    <label>Phone</label>
    </div>
    <div class="user-box">
    <input type="Username" name="Username" required>
    <label>Username</label>
    </div>
    <div class="user-box">
    <input type="password" name="Password" required>
    <label>Password</label>
    </div>
    <input type="submit" value="Send" name="Send"><br>
    <?php
// Convert user data to variables
    if(isset($_POST['Send'])){
$Name=$_POST["Name"];
$Email=$_POST["Email"];
$Phone=$_POST["Phone"]; 
$Username=$_POST["Username"];
$Password=$_POST["Password"];
// Encrypt the user's password so that it is not displayed in the database.
$hash_Password=password_hash($Password, PASSWORD_DEFAULT);
// Verify that the user exists in the database before adding him
$sql =<<<EOF
SELECT COUNT(Username) FROM Accounts WHERE Username = '$Username' ;
EOF;

$COUNT = $db->querySingle($sql);
if($COUNT>0){
// Recall user presence message
require_once("Massege/error_reg.php");
}else{
// Add a new user
$sql =<<<EOF
INSERT INTO Accounts
(Name, Email, Phone, Username, Password) 
VALUES('$Name', '$Email',  '$Phone', '$Username', '$hash_Password'); 
EOF;

$ret = $db->exec($sql);
if(!$ret){
    echo $db->lasterrormsg();
}else{
//Go to the login page
    header("location:index.php");
    exit();
}
}
}
$db->close();
    ?>
</form>
</div>
</body>
</html>