<?php
$json = json_decode(file_get_contents("php://input"),true);
if($json['message']) {
    $mess_text = $json['message']['text'];
    $date_of_message = date('d-m-Y H:i:s');
    $db = @new mysqli('localhost', 'root', '', 'comment');
    $query = $db->query("INSERT INTO `message`(`user`, `message`, `date`) VALUES ('KotE','$mess_text','$date_of_message')");
    $last =$db->insert_id;
    if ($query) {
        echo json_encode(['result' => $json['message'] ,'id'=>$last, 'time'=>$date_of_message]);
    }
}