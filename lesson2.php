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
    header('Content-Type: text/html; charset=utf-8');
 $numArr = [1,4,6,7,8,23];
    $arr = 'fs dfg dfg';
    $num = -1;
    $four = 5;
    $zero = 0;
    //1
    if($num > 0){
        echo '1 задание - Положительное число';
    }else{
        echo '1 задание - Отрицательное';
    }
    //2
    echo '<br>' .'2 задание: Длина строки '. strlen($arr) . '<br>';
    //3
    echo '3 задание: Последний символ строки - ' . substr($arr, -1) . '<br>';
    //4
    if($four %  2 == 0){
        echo '4 задание: Чётное' . '<br>';
    }else {
        echo '4 задание: не чётное' . '<br>';
    }
    // 5
    $first = str_split('first_word');
    $second = str_split('second_word');
if($first[0] == $second[0]){
    echo '5 задание: первые быквы слов ' . implode($first) . ' и ' . implode($second) . ' совпадают';
}else{
    echo '5 задание: первые быквы слов ' . implode($first) . ' и ' . implode($second) . ' не совпадают';
}

//6
    $word = 'Топь';
//echo '<br>' . str_split($word)[0];
//    echo substr($word, 0);
//    echo str_split(substr($word, 0))[0];
    echo str_split($word)[0];
//if(str_split(substr($word, 0))[0])



















   $newArr =  explode(' ',$arr);
//    echo $newArr;

//   echo str_split($arr)[0];
   $num3 = 131414;
//   echo '<br>' . str_split($num3)[0] ;
//echo '<br>' . substr($num3, -1);
//    echo str_Split($num3)[5];
//   echo '<br>' . str_split($num3)[strlen($num3) -1];
$result = explode(" ", $arr);
//    echo "<br>" . $result[1];


    $one = 24;
    $two = 12;
    if($one % $two){
//        echo '<br>' . 'without';
    }else{
//        echo '<br>' . 'with';
    }
//    for($i = -100; $i <= 0; $i--){
//        echo '<br>' . $i;
//    }
//    echo "<br>" . 'lalala      aaa';
    ?>
</b>

</body>
</html>