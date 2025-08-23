<?php
session_start();
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
        require_once('error_log.php');
    }
}
}
$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
    background-color: black;
    color: white;
    font-size: 25px;
}

div{
    background-color: black;
    padding: 20px;
    margin: 12%;
    width: 500px;
    margin-left: 30%;
    color: white;
    font-size: 20px;
    border: 5px solid;
}

    </style>
</head>
<body>
    <div>
        <form method="POST">
        <h4>Enter your username and password to loggin : </h4>
        <label >Username :</label>
        <input type="text" name="username"><br>
        <label >Password :</label>
        <input type="text" name="password"><br>
        <input type="submit" value="Loggin" name="Loggin">
    </form>
    </div>
</body>
</html>