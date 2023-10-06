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
<b style="font-size: 30px">
    <?php

 $numArr = [1,4,6,7,8,23];
    $arr = 'fs dfg dfg';
    $num = -1;
    $four = 5;
    $zero = 0;
    if($num > 0){
        echo '1 задание - Положительное число';
    }else{
        echo '1 задание - Отрицательное';
    }
    echo '<br>' .'2 задание: Длина строки '. strlen($arr) . '<br>';
    echo '3 задание: Последний символ строки - ' . substr($arr, -1) . '<br>';

    if($four %  2 == 0){
        echo '4 задание: Чётное' . '<br>';
    }else{
        echo '4 задание: не чётное' . '<br>';
    }
   $newArr =  explode(' ',$arr);
//    echo $newArr;

   echo str_split($arr)[0];
   $num3 = 131414;
//   echo '<br>' . str_split($num3)[0] ;
echo '<br>' . substr($num3, -1);
   echo '<br>' . str_split($num3)[strlen($num3) -1];
$result = explode(" ", $arr);
    echo "<br>" . $result[1];


    $one = 24;
    $two = 12;
    if($one % $two){
        echo '<br>' . 'without';
    }else{
        echo '<br>' . 'with';
    }
//    for($i = -100; $i <= 0; $i--){
//        echo '<br>' . $i;
//    }
    echo "<br>" . 'lalalaaaaaaaaaaaaaaa'
    ?>
</b>

</body>
</html>