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

//$charLength = file_get_contents('text.txt');
//echo strlen($charLength);

//2

//$get_text = $_POST['area'] . "\n";
//file_put_contents('text.txt', $get_text, FILE_APPEND);

//3

//$str = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, recusandae.";
$str = file_get_contents('text.txt');
$splitted_str = explode(' ', $str);
foreach($splitted_str as $key=> $value){
    if($key % 2 == 0){
        echo "<b>$value </b>";
    }else{
        echo "<i>$value </i>";
    }

}
//4
//Дан текстовый файл со словами и с дробями вида 1/2. Напишите программу, которая обернет каждую дробь в свой тег span. Результат запишите в новый файл.
$fraction = "Lorem   ipsum dolor 1/2 sit amet, consectetur 3/4 adipisicing elit. Hic, recusandae.";
$position =strpos($fraction, '/');
$regExp = '#(\d.\d)#';
$search = preg_match_all($regExp, $fraction, $matches);
print_r($matches);
?>

</body>
</html>