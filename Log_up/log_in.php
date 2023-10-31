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
include '../OOPzoo/localhost/DBCrud.php';
$usersdb = new DBCrud('users','localhost','root','', 'comment');
if($_POST['send'])
?>


<div class="no">no</div>
<div class="yes">yes</div>
<form method="POST">
    <input type="text" placeholder="email" name="login">
    <input type="text" placeholder="password" name="password">
    <input type="submit" value="send">

</form>
</body>
</html>