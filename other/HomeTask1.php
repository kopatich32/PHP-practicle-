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
<b style="font-size: 30px;">
    <?php
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