<?php 
class MyDB extends SQLite3 {
    function __construct() {
        $this->open('ZS.db');
    }
}
$db = new MyDB();
if(!$db) {
    echo $db->lastErrorMsg();
}

if(isset($_POST['Send'])){
$Name=$_POST["Name"];
$Email=$_POST["Email"];
$Phone=$_POST["Phone"]; 
$Username=$_POST["Username"];
$Password=$_POST["Password"];

$sql =<<<EOF
INSERT INTO ACCOUNTES
(NAME, EMAIL, PHONE, USERNAME, PASSWORD) 
VALUES('$Name', '$Email',  '$Phone', '$Username', '$Password'); 
EOF;

$ret = $db->exec($sql);
if(!$ret){
    echo $db->lasterrormsg();
}else{
    header("location:index.php");
    exit();
}
}
$db->close();
?>
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
<h2>Create Accounte</h2>
<form method="POST">
    <div class="user-box">
    <input type="text" name="Name" >
    <label>Name</label>
    </div>
    <div class="user-box">
    <input type="Email" name="Email">
    <label>Email</label>
    </div>
    <div class="user-box">
    <input type="Phone" name="Phone">
    <label>Phone</label>
    </div>
    <div class="user-box">
    <input type="Username" name="Username">
    <label>Username</label>
    </div>
    <div class="user-box">
    <input type="password" name="Password">
    <label>Password</label>
    </div>
    <input type="submit" value="Send" name="Send">
</form>
</div>
</body>
</html>