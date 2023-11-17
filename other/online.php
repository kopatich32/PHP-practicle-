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


<form method="POST" enctype="multipart/form-data">
    <textarea name="area" cols="30" rows="10"></textarea>
    <input type="submit" value="Send">
</form>

<?php
//1
//Дан текстовый файл. Получите количество символов в нем.
//$charLength = file_get_contents('text.txt');
//echo '<pre>'. strlen($charLength) . "</pre>";
//echo $charLength;

//2

//$get_text = $_POST['area'] . "\n";
//file_put_contents('text.txt', $get_text, FILE_APPEND);

//3

//$str = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, recusandae.";
//$str = file_get_contents('text.txt');
//$splitted_str = explode(' ', $str);
//foreach($splitted_str as $key=> $value){
//    if($key % 2 == 0){
//     $res1 = "<b>$value </b>";
//    }else{
//         $res2 ="<i>$value </i>";
//        file_put_contents('result.txt', $res2);
//    }
//}
//echo 'lala'


//4
//Дан текстовый файл со словами и с дробями вида 1/2. Напишите программу, которая обернет каждую дробь в свой тег span. Результат запишите в новый файл.
$fraction = file_get_contents('text.txt');
//$position =strpos($fraction, '/');
$regExp = '#(\d.\d)#';
$search = preg_match_all($regExp, $fraction, $matches);
foreach($matches[0] as $value){
    echo '<b>'.  $value. " " .'</b>';
}
?>
<pre>
    <?= print_r($matches);?>
<!--    Почему 2 массива?-->
</pre>

</body>
</html>