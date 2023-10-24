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
    <input type="text" name="new_animal">
<!--    <input type="text" placeholder="new name">-->
    <input type="submit" value="add" name="submit">
    <input type="submit" name="delete" value="delete">
</form>
<?php

$db_adress = 'localhost';
$db_user = 'root';
$db_password = '';
$dta_testdb = 'FirstBase';
$DataBase = @new mysqli($db_adress,$db_user,$db_password,$dta_testdb);
if(isset($_POST['submit'])){
    if($DataBase->connection_errno){
        echo "error: " .$DataBase->connection_errno;
    }else {
        $animal_name = $_POST['new_animal'];
        $query = $DataBase->query("INSERT INTO `Zoo`(`Animal`) VALUES ('$animal_name')");
    }
}

// delete field


    if(isset($_POST['delete'])){
        if($DataBase->connection_errno){
            echo "error: " .$DataBase->connection_errno;
        }else {
            $animal_name = $_POST['new_animal'];
            $query = $DataBase->query("DELETE FROM `Zoo` WHERE `Animal` = '$animal_name'");
        }
    }


$query1 =$DataBase->query("SELECT * FROM `Zoo`");
    $row = $query1->fetch_assoc();
    echo$row['Animal'][0];






if($DataBase->connection_errno){
    echo "error: " .$DataBase->connection_errno;
}else{
    echo 'connection success';
    $query =$DataBase->query("SELECT * FROM `Zoo`");

//    $result = $query->fetch_assoc();
//    var_dump($result);
    echo '<table border="1">';
    while($row =$query->fetch_assoc()){

        var_dump($row);
        echo '<tr>';
        echo '<td>';
        echo $row['id'];
        echo '</td>';

        echo '<td>';
        echo $row['Animal'];
        echo '</td>';
        echo '</tr>';

    }
    echo "</table>";

}

?>

<pre>
    <?php
     var_dump($query->fetch_assoc());
    ?>
</pre>
</body>
</html>