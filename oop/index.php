
<?php
require_once  __DIR__ . '/vendor/autoload.php';


use Steampixel\Route;
use hehe\controllers\UserController;
Route::add("/laaaa", function(){
    echo 'lalalal';

});

Route::add('/reg', function(){
   include 'src/views/userreg.php';
});

$name = '/api/reg';
Route::add($name,function(){
    $json = json_decode(file_get_contents('php://input'),true);
    $uc = new UserController();
    $uc->reg($json);
},'post');


Route::add('/api/auth',function(){

});
Route::run('/');
