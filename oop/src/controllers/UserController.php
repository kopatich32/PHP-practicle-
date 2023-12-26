<?php
//namespace hehe\oop\controllers;
namespace hehe\controllers;
use hehe\models\UserModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class UserController
{
    public function reg($json)
    {
//        print_r(json_encode($json));
        if (!empty($json['login']) and !empty($json['pass'])) {
            echo json_encode([
                'status' => 'ok',
                "payload" => [
                    "login" => $json['login'],
                    "name" => $json['name'],
                ]
            ]);
            $um = new UserModel;
            $res = $um->userReg($json['login'], $json['pass'], $json['name']);
        }
    }
}