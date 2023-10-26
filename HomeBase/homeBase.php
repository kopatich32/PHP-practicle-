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
<div class="comment_wrapper">
    <div class="left_symbols">
        <div class="symbols">Осталось символов</div>
        <div class="counter"></div>
    </div>
    <form method="POST">
        <textarea id="message" placeholder="Комментарий" maxlength="100" name="comment"></textarea>
    <div class="buttons">
        <button class="close" hidden>Закрыть</button>
        <button class="send" type="submit" name="send">Отправть</button>
        <div id="out"></div>
    </div>
    </form>
</div>
<div class="comment_of_user">
    <div class="avatar"><img width="60" height="60"  src="IMG_20231026_001815.jpg" alt="User avatar"></div>
    <div class="top_row">
        <div class="user_name">Kote</div>
        <div class="time">24-10-2023</div>
    </div>
</div>
<?php
//$db = @new mysqli('localhost','root','','comment');
//if($db->connect_errno):
//    echo 'Error number: ' . $db->connect_errno . '. Reason - ' . $db->connect_error;
// endif;
//if(isset($_POST['send'])){
//    $time_of_message = date('d-m-Y H:i:s');
//    $text_of_message = $_POST['comment'];
//    echo $time_of_message;
//    echo '<br>' . $text_of_message;
//    $db->query("INSERT INTO `message`(`user`,`message`, `date`) VALUES ('k','$text_of_message','$time_of_message')");
//}
//?>


<script>
    let counter = document.querySelector('.counter');
    let textarea = document.querySelector('#message');
    let messageLength = textarea.getAttribute('maxlength');
    counter.innerText = +messageLength;
    let count =  +counter.innerText;
    textarea.addEventListener('input', function(){
        if(count >0){
            counter.innerText =  count - textarea.value.length;
            console.log(counter.innerText)
        }
    })
</script>

</body>
</html>