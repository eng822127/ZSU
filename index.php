<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/log.css">
    <title>Document</title>
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
                echo "If you do not have an account , <a href='create_accounte.php'> create accoumte </a>";
        class MyDB extends SQLite3 {
    function __construct() {
        $this->open('ZS.db');
    }
}
$db = new MyDB();
if(!$db) {
    echo $db->lastErrorMsg();
}

$sql =<<<EOF
SELECT * FROM ACCOUNTES ;
EOF;

$ret = $db->query($sql);

if(isset($_POST['Loggin'])){
$username =$_POST['username'];
$password =$_POST['password'];


while($row = $ret->fetchArray(SQLITE3_ASSOC)){
    if($username==$row['USERNAME'] && $password==$row['PASSWORD']){
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if($_POST['username']===$row['USERNAME']){
        $_SESSION['name']=$row['NAME'];
        $_SESSION['email']=$row['EMAIL'];
        $_SESSION['phone']=$row['PHONE'];
        $_SESSION['id']=$row['ID'];
        }
    }
        header("location:homepage.php");
    exit();
    }else{
        require_once("Massege/error_log.php");
    }
}
}
$db->close();
        ?>
    </div>
        <input type="submit" value="Loggin" name="Loggin">
</form>
</div>
</body>
</html>

