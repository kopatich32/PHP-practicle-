
<?php
require_once  __DIR__ . '/vendor/autoload.php';


use Steampixel\Route;
use hehe\controllers\UserController;
Route::add("/laaaa", function(){
    echo 'lalalal';

});

Route::add('/auth', function(){
   $uc = new UserController;
   $uc->hi();

});
Route::add('/reg', function(){
   include 'src/views/userreg.php';
});

Route::add('/api/reg',function(){
    $del_json = json_decode(file_get_contents('php://input'),true);
//    print_r(json_encode($del_json));
    $uc = new UserController();
    $uc->reg($del_json);
},'post');

Route::run('/');
