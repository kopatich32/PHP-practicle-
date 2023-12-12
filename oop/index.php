<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
class example{
    public function first(){
        echo 'lalal';
    }
}
$init = new Example();
$init->first();
?>

<?php
class DataBase{
    protected $ip;
    protected $login;
    protected $password;
    protected $DBname;
    protected function __construct($ip,$login,$password,$DBname){
        $this->ip = $ip;
        $this->login = $login;
        $this->password = $password;
        $this->DBname = $DBname;
    }
    public function connect(){

    }
    public function disconnect(){

    }
}
?>

<?php
class cat{
    public function walk(){
        echo 'top-top';
    }
    public function voice(){
        echo "meow >=(>^_^<)";
    }
    function Catch(dog $cat){
        echo 'Catch';
        $cat->voice();
    }
}
class dog{
    public function walk(){
        echo 'walk';
    }
    public function voice(){
        echo 'Woff-woff';
    }
    function Catch(Cat $cat){
        echo 'Catch';
        $cat->voice();
    }
}
$dog= new dog();
$cat = new cat();
$cat->voice()
?>

</body>
</html>