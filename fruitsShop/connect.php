
<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'shop');
if($connection = $db->connect_errno){
    echo 'Connection error ' . '- ' . $db->connect_errno . '. Reason - ' . $db->connect_error;
}
