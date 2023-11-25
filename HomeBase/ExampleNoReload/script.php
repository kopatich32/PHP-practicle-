<?php



$json = json_decode(file_get_contents("php://input"),true);
if($json['payload']){
        $login = $json['payload']['login'];
        $pass = $json['payload']['pass'];
        $email = $json['payload']['email'];
        $name = $json['payload']['name'];
        $photo = 'photo';
        $role = 'user';
        $db = @new mysqli('localhost', 'root', '', 'shop');
        $query = $db->query("INSERT INTO `users`(`login`, `pass`, `email`, `name`, `photo`, `role`) VALUES ('$login','$pass','$email','$name','$photo','$role')");
        if($query){
            echo json_encode([
                "status"=> 'echo success',
            ]);
        }
}
