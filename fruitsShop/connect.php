
<?php
session_start();
function connected(){

}
$db = new mysqli('localhost', 'root', '', 'shop');
if($connection = $db->connect_errno){
    echo 'Connection error ' . '- ' . $connection->connect_errno . '. Reason - ' . $connection->connect_error;
}


