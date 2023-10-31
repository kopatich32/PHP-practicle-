<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="loginStyles.css">
</head>
<body>
<?php
$status = false;
if($_POST['send']){
    $login = $_POST['login'];
    $pass = $_POST['password'];
    if(!empty($login) and !empty($pass)){
        $db = @new mysqli('localhost','root','','comment');
        if($db->connect_errno){
            echo "error: " . $db->connect_errno . ' number: ' . $db->connect_error;
        }else{
            $query = $db->query("SELECT * FROM `login` WHERE `login` = '$login' AND `password` = '$pass'" );
            $row = $query->fetch_assoc();
            if(($row)){
                $status = true;
                echo 'access';
                echo $row['email'];
            }
            if($row == null){
                $status = false;
                echo 'nope';
            }
        }

    }
    echo $_POST['login'];
    echo $_POST['password'];
}

?>


<div class="no">no</div>
<div class="yes">yes</div>
<form method="POST">
    <input type="text" placeholder="login" name="login">
    <input type="text" placeholder="password" name="password">
    <input type="submit" name="send">

</form>
</body>
</html>