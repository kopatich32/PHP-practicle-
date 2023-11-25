<?php
$json =json_decode(file_get_contents('php://input'),true);
if($json['message']) {
    $mess_text = $json['message']['textOfMessage'];
    $db = @new mysqli('localhost', 'root', '', 'comment');
    $query = $db->query("INSERT INTO `message`(`user`, `message`, `date`) VALUES ('KotE','$mess_text','today')");
    if ($query) {
        echo json_encode(['status' => 'getted']);
    }
}

