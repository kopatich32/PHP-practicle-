<?php
var_dump($_POST)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="" method="POST">
   <input type="text" name="tr" placeholder="name">
    <input type="text" name="td" placeholder="password">
    <input type="submit" value="push">
   </form>
   <table border="1">
   <?php
if (!empty($_POST)) {
    $tr = $_POST['tr'];
    $td = $_POST['td'];
    for ($i = 0; $i < $tr; $i++) {
        ?> <tr> <?php
        for ($j = 0; $j < $td; $j++) {
            ?>
<td><?=$j?></td>
            <?php
        }?>
    </tr>
    <?php
    }
}
?>
<?php

$users = [
    1=>[
        'name'=>'ivan',
        'last_name' => 'Ivanov',
        'age'=> 20,
    ],2=>[
        'name'=>'Alesha',
        'last_name' => 'Balalaikin',
        'age'=> 25,
    ],3=>[
        'name'=>'Masha',
        'last_name' => 'V kaske',
        'age'=> 25,
    ],
];
if(!empty($users)){
    ?> <table border="1"> <?php
    foreach($users as $key=> $value){
        ?> <tr><?php
        ?><td><?php
        echo $key;
        ?></td><?php
        foreach($value as $key=>$info){
            ?><td><?php
            echo $info;
            ?></td><?php
        }      
        ?></tr><?php
    }
    ?></tr><?php

}
?>
</table>
</body>
</html>