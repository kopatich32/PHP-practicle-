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
class Human{

    public $testVar = 'test text';
    public function voice(){
        echo 'laaaala ' . $this->testVar;
    }
    public function __construct(){

    }
}


$person = new Human();
//$person->voice();

?>

<?php
class Person{
    protected $name;
    protected $sur_name;
    protected $last_name;
    protected $age;
    public function __construct($name,$sur_name,$last_name,$age){
        $this->name = $name;
        $this->sur_name = $sur_name;
        $this->last_name = $last_name;
        $this->age = $age;
    }
    public function sayHi(){
        return "Hi, it's" . $this->name;
    }
}
$someHuman = new  Person(' Alesha ',2,3,4);
echo $someHuman->sayHi() . ' age ' ;

class Point{
    protected int $x;
    protected int $y;
    public function __cunstruct(int $x, int $y= 3){
        $this->x =$x;
        $this->y =$y;
//        return $y*$x;
    }
}
?>
<?php
class Worker extends  Person{
    protected $typeWorkWeek;
    protected $proff;
    public function __construct($name, $sur_name, $last_name, $age,$typeWorkWeek,$proff)
    {
        parent::__construct($name, $sur_name, $last_name, $age);
        $this->typeWorkWeek =$typeWorkWeek;
        $this->proff=$proff;
    }
    public function getProf(){
        return $this->proff;
    }
    public function isWeekend($day){
        switch ($day){
            case "sunday":
                return 'yes';
                break;
            case 'saturday':

            return 'yess';
            break;
            default:
                echo 'nope';
        }
    }
}

class Work extends Worker {
    protected $worker;
    protected $typeOfWork;

    public function __construct(Worker $worker, $typeOfWork){
        $this->worker = $worker;
        $this->typeOfWork = $typeOfWork;
    }
    public function DOaction(){
        if($this->worker->getProf() != $this->typeOfWork){
            echo 'vacation';
        }else{
            echo 'Have to work';
        }
    }
}
$work = new Work();
$work->getProf();
?>

</body>
</html>