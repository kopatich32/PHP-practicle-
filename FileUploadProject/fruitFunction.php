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
    <label for="upload">Выбери файл</label>
    <input id="upload" type="file">
    <input type="submit" value="send">
</form>

<section>
    <div class="a">bugaga</div>
    <div class="b">llala</div>
</section>
<style>
    label{
        display: inline-block;
    }
    .a{
        width: 100px;
        height: 100px;
        border: 2px solid red;
        margin-right: 50px;
        font-size: 15px;
    }
    /*.b{*/
    /*    width: 100px;*/
    /*    height: 100px;*/
    /*    border: 2px solid green;*/
    /*         font-size: 23px;*/
    /*    font-weight: bold;*/
    /*}*/
     section{
         display: flex;
         width: 100%;
         justify-content: center;
     }
</style>
<script>
    let uploadInput = document.querySelector('#upload');
    let label = document.querySelector('label')
let a = document.querySelector('.a')
let b = document.querySelector('.b')
    console.table(getComputedStyle(a))


</script>

<?php
$fruit = ['апельсин', 'апельсина','апельсинов' ];
function chooseEnding($amount, $fruit){
    $title = [2,0,1,1,1,2];
    return $amount . ' '. $fruit[$amount % 100 > 4 && $amount % 100 < 20 ? 2 : $title[min($amount % 10, 5)]];

}
//echo  chooseEnding(24, $fruit);

?>

</body>
</html>