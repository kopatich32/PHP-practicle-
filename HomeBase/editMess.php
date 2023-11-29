<?php
$json2 = json_decode(file_get_contents("php://input"), true);
if ($json2['edited']) {
    $mess_text = $json2['edited']['message'];
    $date_of_message = date('d-m-Y H:i:s');
    $db = @new mysqli('localhost', 'root', '', 'comment');
    $query = $db->query("INSERT INTO `message`(`user`, `message`, `date`) VALUES ('KotE','$mess_text','$date_of_message')");
    $last = $db->insert_id;
    if ($query) {
        echo json_encode(['result' => $json2['edited'], 'id' => $last, 'time' => $date_of_message]);
    }
}