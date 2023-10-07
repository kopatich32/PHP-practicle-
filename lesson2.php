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

//    1.1 CodeMU
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
    echo '3 задание: Последний символ строки - ' . $arr . ' - ' . substr($arr, -1).  '<br>';
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
    echo '5 задание: первые быквы слов ' . implode($first) . ' и ' . implode($second) . ' не совпадают' . '<br>';
}

//6
    $word = 'xhaemb';

    if(str_split($word)[strlen($word) -1] == 'b'){
        echo 'Задание 6: Если последняя буква b из слова ' . $word . ', будет выведена предпоследняя - ' . str_split($word)[strlen($word) - 2];
    }else{
       echo 'Задание 6: Последняя буква не b';
    }
//codemu 1.4
    $num3 = 831414;
    $one = 24;
    $two = 12;
    echo  '<br>' . 'Task 1:  First digit of number ' . $num3 . ' is '. str_split($num3)[0];
    echo  '<br>' . 'Task 2:  Last digit of number ' . $num3 . ' is '. str_split($num3)[strlen($num3)-1];
    echo '<br>' . 'Task 3: Sum first and last symbol of number ' . $num3 .' is ' . (str_Split($num3)[0] + str_split($num3)[strlen($num3) -1]);
    echo '<br>' . 'Task4: Number of digits in the number ' . $num3 . ' is ' . strlen($num3);
    if(str_split($one)[0] == str_split($two)[0]){
        echo '<br>' . 'Task 5: first digits of numbers ' . $one . ' and ' . $two .  ' match';
    }else echo '<br>' . 'Task 5: first digits of numbers ' . $one . ' and ' . $two . ' not match';

    ?>
</b>

</body>
</html>