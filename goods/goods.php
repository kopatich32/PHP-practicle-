<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>


<?php
function out($arr){
    echo '<pre>';
    echo print_r($arr);
    echo '/<pre>';
}
$db_connect = @new mysqli('localhost', 'root','','goods');
if($db_connect->connect_errno){
    echo 'error: ' . ' '. $db_connect->connect_errno . ' reason of error ' . $db_connect->connect_error;
}
$goods = $db_connect->query("SELECT * FROM `goods`");

$amount = "";
if($_GET){
    $current_id= $_GET['id'];
//    var_dump($current_id);
    $hide_item = $db_connect->query("SELECT `amount` FROM `goods` WHERE `id` = '$current_id';");
    $amount_res = $hide_item->fetch_assoc();
    $amount = $amount_res['amount'];
}
echo($amount);
echo $_POST['count']
?>



    <div class="wrapper">
       <?php while($row= $goods->fetch_assoc()){
        //    out($row);
        ?>
        <div class="goods">
            <div class="item"><?= $row['item'] ?></div>
            <div class="cost">Цена <?= $row['cost'] ?></div>
            <div class="amount">Количество <?= $row['amount'] ?></div>
            <div class="picture">
                <!--        <img src="" alt="item">-->
            </div>

            <form method="POST">
                <input type="text" name="count" placeholder="количество">
            </form>

            <a href="?id=<?=$row['id']?>">
                <button class="send" type="submit">Купить</button>
            </a>
            <script>
                let link = document.querySelector('button');
                link.onclick = e=>e.preventDefault();
            </script>
        </div>
       <?php }?>
    </div>
<script>
    document.querySelector('.send').addEventListener('click',()=>{
        let formdata = new FormData();
        formdata.set('count', document.querySelector('input[name="count"]').value)
        fetch('goods.php',{
            method: 'POST',
            body: formdata,
        })
        console.log(formdata)


    })


</script>
</body>
</html>