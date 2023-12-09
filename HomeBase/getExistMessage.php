<?php
$arr = [];
$db = new mysqli('localhost', 'root', '', 'comment');
$del_json = json_decode(file_get_contents('php://input'),true);
if($del_json['answer']){
    $row = $db->query("SELECT * FROM `message`");
    foreach ($row as $value) {
        array_push($arr, $value);
    }
    echo json_encode($arr);
}