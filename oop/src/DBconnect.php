<?php
namespace hehe;
class DBconnect{
    public static function connect(){
        $mysqli = @new \mysqli('localhost', 'root','','oopProject');
        if(mysqli_connect_errno()){
            echo 'Охибка' . mysqli_connect_errno();
        }
        return $mysqli;
}
}