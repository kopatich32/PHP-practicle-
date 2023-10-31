<?php

include 'DBCrud.php';
$dbcrud = new DBCrud('zoo', 'localhost', 'root', '', 'testdb');


$arr = [
    "Animal" => "Frog"
];


//$dbcrud->Insert($arr);

//$dbcrud->Delete('animal', "Собака");

$dt = $dbcrud->Select(["id", "animal"]);
echo '<pre>';
var_dump($dt);
echo '</pre>';
// $db = @new mysqli($db_address,$db_user, $db_pass,$db_testdb);
// if(isset($_POST['submit']))
// {
//     if($db->connection_errno)
//     {
//         echo "error: ".$db->connection_errno;
//     }else
//     {
//         $anim = $_POST['new_animal'];
//         $query = $db->query("INSERT INTO `zoo`(`animal`) VALUES ('$anim')");
//     }
// }

// if(isset($_POST['delete']))
// {
//     if($db->connection_errno)
//     {
//         echo "error: ".$db->connection_errno;
//     }else
//     {
//         $anim = $_POST['new_animal'];
//         $query = $db->query("DELETE FROM `zoo` WHERE `animal` = '$anim';");
//     }
// }



// if($db->connection_errno)
// {
//     echo "error: ".$db->connection_errno;
// }else{
//     $query = $db->query("SELECT * FROM `zoo`");
//     //$res = $query->fetch_assoc();
//     echo '<table border="1">';
//     while($row = $query->fetch_assoc())
//     {
//         echo '<tr>';

//         echo '<td>';
//         echo $row['id'];
//         echo '</td>';


//         echo '<td>';
//         echo $row['animal'];
//         echo '</td>';

//         echo '</tr>';
        
//     }
//     echo '</table>';
//     //var_dump($res);
// }
?>


<form method="post">
    <input type="text" name="new_animal">
    <input type="submit" value="добавить" name="submit">
    <input type="submit" value="удалить" name="delete">
</form>