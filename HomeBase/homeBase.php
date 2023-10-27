<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment field</title>
    <link rel="stylesheet" href="Comment.css">
</head>
<body>
<div class="container">
    <div class="comment_wrapper">
        <div class="left_symbols">
            <div class="symbols">Осталось символов</div>
            <div class="counter"></div>
        </div>

        <form method="POST" name="commentArea">
            <textarea id="message" placeholder="Комментарий" maxlength="100" name="comment"></textarea>
            <div class="buttons">
                <button class="close" hidden>Закрыть</button>
                <button class="send" type="submit" name="send">Отправить</button>
                <div id="out"></div>
            </div>
        </form>
    </div>
    <?php
    $db = @new mysqli('localhost','root','','comment');
    if($db->connect_errno):
        echo 'Error number: ' . $db->connect_errno . '. Reason - ' . $db->connect_error;
    endif;
    if(isset($_POST['send']) or isset($_POST['comment']) ){
        $time_of_message = date('d-m-Y H:i:s');
        $text_of_message = $_POST['comment'];
       $row = $db->query("INSERT INTO `message`(`user`,`message`, `date`) VALUES ('lala','$text_of_message','$time_of_message')");

    }

    $out = $db->query("SELECT * FROM `message`");
    $row1 = $out->fetch_row();
    ?>
<!--<pre>-->
<!--    --><?php
//    while($res = $out->fetch_object()){
//    print_r($res);
//    }?>
<!---->
<!--</pre>-->
<?php
while($row3 = $out->fetch_assoc()){ ?>
    <div class="comment_of_user">
        <div class="comment_header">
            <div class="avatar">
                <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">
            </div>
            <div class="user_name">KotE</div>
            <div class="time"><?php echo $row3['date']?></div>
        </div>
        <div class="entered_message"><?php echo $row3['message']?></div>
    </div>
<?php } ?>
</div>

<script src="CharsCounter.js"></script>
</body>
</html>