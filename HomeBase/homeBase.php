

<?php
$db = @new mysqli('localhost', 'root', '', 'comment');
if ($db->connect_errno):
    echo 'Error number: ' . $db->connect_errno . '. Reason - ' . $db->connect_error;
endif;
////
if(isset($_POST['message'])){
    $text = $_POST['message'];
    $edit_id = $_GET['refactor'];
    echo 'asasasasa';
//    $query6 = $db->query("UPDATE `message` SET `user`='lala',`message`='$text',`date`='$time_of_message' WHERE `id` = '$edit_id'");
    $row = $db->query("UPDATE `message` SET `user`='ololo',`message`= '$text' WHERE `id` = 203");
}
//////
if(isset($_POST['send'])){
    $time_of_message = date('d-m-Y H:i:s');
    $text_of_message = $_POST['comment'];
    $row = $db->query("INSERT INTO `message`(`user`,`message`, `date`) VALUES ('lala','$text_of_message','$time_of_message')");
}

if (isset($_GET['del'])){
    $current_id = $_GET['del'];
    $del = $db->query("DELETE FROM `message` WHERE `id` = $current_id;");
}

$out = $db->query("SELECT * FROM `message` ORDER BY `id` DESC "); //ASC
?>
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
                <button class="close" name="close">Закрыть</button>
                <button class="send" type="submit" name="send">Отправить</button>
                <div id="out"></div>
            </div>
        </form>
    </div>
<?php

    while($row3 = $out->fetch_assoc()){?>
        <div   class="comment_of_user num_<?= $row3['id'] ?>">
            <form method="POST" name="showed_mess">
    <div class="comment_header">
            <div class="avatar">
                <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">
            </div>
            <div class="user_name">KotE</div>
            <div class="time"><?= $row3['date']?></div>
        </div>
            <input class="entered_message" maxlength="100"  name="message" contenteditable="false" value="<?= $row3['message'] ?>">

            <div class="edit_buttons">
            <a class="edit" href="?refactor=<?= $row3['id'] ?>">
                <button class="editBtn"  name="edit">Редактировать</button>
                <button class="save" name="save">Сохранить</button>
            </a>
            <a class="delete">
<!--                href="?del=--><?php //= $row3['id'] ?><!--">-->
                <button  name="admin_del_btn">Удалить</button>
            </a>
        </div>
            </form>

        </div>
    <div class="confirm_delete_message">
        <p>Удалить?</p>
        <div class="choose">

        <a href="?del=<?= $row3['id'] ?>">
            <button class="yes" name="yes" type="submit">Да</button>
            </a>
            <button class="no">Нет</button>
        </div>
    </div>
    <?php }?>
</div>

<script src="CharsCounter.js"></script>
<script src="EditComment.js"></script>
</body>
</html>