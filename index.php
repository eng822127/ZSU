<?php
// The beginning of the session
session_start();
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
    <title>log-in</title>
</head>
<body>
    <div class="login-box">
<h2>Login</h2>
<form method="POST">
    <div class="user-box">
    <input type="text" name="username" >
    <label>Username</label>
    </div>
    <div class="user-box">
    <input type="password" name="password">
    <label>Password</label>
    <?php
                echo "If you do not have an account , <a href='create_account.php'> create account </a>";
// Browse fields from the database and convert field elements to arrays 
$sql =<<<EOF
SELECT * FROM Accounts ;
EOF;

$ret = $db->query($sql);
// Convert the username and password entered by the user into variables
if(isset($_POST['Login'])){
$username =$_POST['username'];
$password =$_POST['password'];

while($row = $ret->fetchArray(SQLITE3_ASSOC)){
// Verify username and password, start a session, and store user data in variables for use within the session
    if($username==$row['Username'] && password_verify($password ,$row['Password']) ){
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if($_POST['username']===$row['Username']){
        $_SESSION['name']=$row['Name'];
        $_SESSION['email']=$row['Email'];
        $_SESSION['phone']=$row['Phone'];
        $_SESSION['id']=$row['Id'];
        }
    }
// Go to the home page
        header("location:homepage.php");
    exit();
    }else{
//Invoke username and password error message
        require_once("Massege/error_log.php");
    }
}
}
$db->close();
// Recall user registration message
require_once("Massege/success_reg.php");
//Login message
$_SESSION['success_log'] = 'You have successfully logged in!';
        ?>
    </div>
        <input type="submit" value="Login" name="Login">
</form>
</div>
</body>
</html>

