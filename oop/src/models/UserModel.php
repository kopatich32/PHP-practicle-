<?php

namespace hehe\oop\models;

namespace hehe\models;

use hehe\DBconnect;

class UserModel
{
    public function userReg($login, $pass, $name)
    {
        $db = DBconnect::connect();
        $res = $db->query("INSERT INTO `oop`(`name`, `login`, `pass`) VALUES ('$name','$login','$pass')");
        if ($res) {
            return ["login" => $login, "name" => $name];
        } else {
            return false;
        }
    }

    public function userAuth($login, $pass)
    {
        $db = DBconnect::connect();
        $res = $db->query("SELECT * FROM `oop` `login` = '$login' AND `pass` = '$pass'");
$res = mysqli_fetch_assoc($res);
        if ($res) {
            return ['status' => 'ok',
                'payload' => ['login' => $login,
                    'name' => $res['name'],
                    ]
            ];
        }
    }
}