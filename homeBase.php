<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">
    <input type="text" placeholder="animal name" name="animal">
    <input type="text" placeholder="enter the age" name="age">
    <input type="submit" value="fill to base" name="add">
<!--    <input type="submit" value="discard from base" name="del">-->
</form>

<?php
$connect = @new mysqli('localhost','root','', 'home');

    if($connect->connect_errno):
        echo 'error: ' . $connect->connect_errno;
    else:

echo 'connection is success';
        $input_value = $_POST['animal'];
        $age_beast = $_POST['age'];
        echo $input_value;
        echo $age_beast;
        $query = $connect->query("INSERT INTO `zoo`(`animal`, `age`) VALUES ('$input_value','$age_beast')");

        endif;


?>







<table>
<?php
$result = $connect->query("SELECT * FROM `zoo`");

    while($row = $result->fetch_assoc()){
        ?>
         <tr>
             <td><?=$row['id']?></td>
             <td><?=$row['animal']?></td>
             <td><?=$row['age']?></td>
         </tr> <?php
    }


    ?>

</table>
<style>
    table{
        border-collapse: collapse;
        width: 100px;
        height: 100px;
    }
    table tr td{
        text-align: center;
        vertical-align: middle;
        border: 1px solid black;
    }
</style>
</body>
</html>