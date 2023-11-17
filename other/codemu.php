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
////1.1
////1
//$num = -13;
//$strLength = 'sdf';
//$secondWord ='akasvb';
//if($num > 0){
//    echo 'more than zero';
//}else echo "nope" . '<br>';
////2
//echo strlen($strLength) . '<br>';
////3
//echo '<br>' . str_split($strLength)[strlen($strLength) -1 ] . '<br>';
////4
//if($num % 2 == 0){
//    echo 'yes'.'<br>';
//}else echo 'no'.'<br>';
////5
//if(str_split(@$strLength)[0] == str_split($secondWord)[0]){
//    echo 'yes' .'<br>';
//}else echo 'no' . '<br>';
////6
//if(str_split($secondWord)[strlen($secondWord) -1] == 'b'){
//    echo str_split($secondWord)[strlen($secondWord) -2];
//}else echo str_split($secondWord)[strlen($secondWord) -1];

////////1.2

////1
//$num2 = 63214;
//echo str_split($num2)[0] . '<br>';
////2
//echo str_split($num2)[strlen($num2)-1] . '<br>';
////3
//$last = str_split($num2)[strlen($num2)-1];
//$first = str_split($num2)[0];
//echo 'sum last an first digit of ' .$num2 . ' is ' . $last + $first . '<br>';
////4
//echo strlen($num2) . '<br>';
////5
//if(str_split($num2)[strlen($num2)-1] == str_split($num2)[0]){
//    echo 'yes' . '<br>';
//}else echo 'no' . '<br>';

//////////1.3
////1
//$str3 = 'aasfsarf';
//if(strlen($str3) > 1){
//    echo str_split($str3)[strlen($str3)-2] . '<br>';
//}else echo 'no';
////2
//
//$num32 =24;
//$num33 = 4;
//if($num32 % $num33 ==0 ){
//    echo 'without  = ' . $num32 / $num33 . '<br>';
//}else echo 'no, less = ' . $num32 % $num33;

////1.4

////1
function console_log($data)
{
    if (is_array($data) || is_object($data)) {
        echo("<script>console.log('php_array: " . json_encode($data) . "');</script>");
    } else {
        echo("<script>console.log('php_string: " . $data . "');</script>");
    }
}

//for($i = -100; $i <= 0; $i++){
////  console_log($i);
//}
////3
//for($i = 100; $i >= 1; $i--){
////  console_log($i);
//}
//
////4
//for($i = 1; $i <=100; $i++){
//    if($i % 2 == 0){
////        console_log($i);
//    }
//}
////5
//for($i = 1; $i <= 100; $i++){
//    if($i % 3 == 0){
////        console_log($i);
//    }
//}

//////// 1.5

//1
//Найдите сумму всех целых чисел от 1 до 100.

//for($i = 0; $i <= 100; $i++){
//$result += $i;
//    console_log($result);
//}
////or
//echo 50* (100);


//2 and 3
//for($i = 0; $i <= 100; $i++){
//    if($i % 2 == 0){
//        $res += $i;
//    }
//    console_log($res);
//}


//4
//$int1 = 32;
//$int2 = 14;
//echo $int1 % $int2;

//5

//$reverse_str = 'kawm';
//$res = strrev($reverse_str);
//echo $res;

//$temperatureF =  32;
//$difference =  9/5;
//$currentTempC = 12;
//$currentTempF = 53.6;
//
//echo 'По Фаренгейту -' . $currentTempC * $difference + $temperatureF . '<br>';
//echo   "По цельсию - " . ($currentTempF - $temperatureF) / $difference;


//$arr = ['year' => getdate()['year'], 'month'=> getdate()['month'], 'day'=>getdate()['mday']];

//$arr = [1,3,6,5];
//if(count($arr) >= 3){
//    $res = $arr[0]+$arr[1]+$arr[2];
//}
 ?>
<?php
$arr = [null, 2, 3, 4, 5];

if (isset($arr[0])) {
    echo '+++';
} else {
    echo '---';
}
?>

<pre id="pre">

</pre>

</body>
</html>