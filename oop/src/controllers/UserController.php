<?php
namespace hehe\oop\controllers;
namespace hehe\controllers;
class UserController{
    public function reg($json){
        print_r(json_encode($json));
    }
    public function auth(){
    }
}