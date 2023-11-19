<?php
$arr = [];
if ($_POST['addText']) {
    echo 'la';
    $db = @new mysqli('localhost', 'root', '', 'comment');
    if ($db->connect_errno) {
        echo "error: " . $db->connect_errno;
    } else {

        $text = $_POST['addText'];
        $query = $db->query("INSERT INTO `message`(`user`, `message`, `date`) VALUES ('[value-2]','$text','[value-4]')");


        $query1 = $db->query("SELECT * FROM `message`");

        while($row = $query1->fetch_assoc()) {
            var_dump($row);
            $arr($row);

        }

        echo json_encode($arr);

    }
}