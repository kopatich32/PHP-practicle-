<?php
$del_json = json_decode(file_get_contents('php://input'),true);
if($del_json['delete']){
    $del_comment = $del_json['delete']['deleteMessage'];
    $db = new mysqli('localhost', 'root', '', 'comment');
    echo json_encode(["id"=> $del_comment]);
    $row = $db->query("DELETE FROM `message` WHERE `id` = '$del_comment'");

}