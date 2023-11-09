<?php
$arr = [];
if ($_POST['addText']) {
    $db = @new mysqli('localhost', 'root', '', 'comment');
    if ($db->connection_errno) {
        echo "error: " . $db->connection_errno;
    } else {

        $text = $_POST['addText'];
        $query = $db->query("INSERT INTO `message`(`text`) VALUES ('$text')");

    
        $query1 = $db->query("SELECT * FROM `message`");

        while($row = $query1->fetch_assoc())
        {
            array_push($arr, $row);

        }

        echo json_encode($arr);

    }
}