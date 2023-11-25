<?php

$db = @new mysqli('localhost', 'root', '', 'comment');
if ($db->connect_errno){
    echo 'Error number: ' . $db->connect_errno . '. Reason - ' . $db->connect_error;
}

if (isset($_POST['send']) && !empty($_POST['comment'])) {
    $time_of_message = date('d-m-Y H:i:s');
    $text_of_message = $_POST['comment'];
    $row = $db->query("INSERT INTO `message`(`user`,`message`, `date`) VALUES ('KotE','$text_of_message','$time_of_message')");
    header('Location: homeBase.php');
    exit();
}

if (isset($_POST['message'])) {
    $id = $_POST['delete_id'];
    $new_text = $_POST['message'];
    $req = $db->query("UPDATE `message` SET `user`='KotE',`message`= '$new_text' WHERE `id` = '$id'");

}
if (isset($_POST['delete'])) {
    $id = $_POST['delete_id'];
    $db->query("DELETE FROM `message` WHERE `id`='$id'");
    header('Location: homeBase.php');
    exit();
}
$out = $db->query("SELECT * FROM `message` ORDER BY `id` DESC "); //ASC?>
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
            </div>
        </form>
    </div>
    <?php
    while ($row3 = $out->fetch_assoc()):?>

        <div class="comment_of_user num_<?= $row3['id'] ?>">
            <div class="comment_header">
                <div class="avatar">
                    <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">
                </div>
                <div class="user_name">KotE</div>
                <div class="time"><?= $row3['date'] ?></div>
            </div>
            <form id="forma" method="post" name="showed_mess">
                <input name="delete_id" value="<?= $row3['id']?>" hidden>
                <textarea class="entered_message" maxlength="100"  name="message" readonly><?= $row3['message'] ?></textarea>
            <div class="edit_buttons">
                <input  type="submit" class="save" name="save" value="Сохранить">
                <div class="editBtn">Редактировать</div>
<!--                <div class="delete">Удалить</div>-->
                <input class="delete" type="submit" value="Удалить" name="delete">
            </div>
            </form>
        </div>
    <?php endwhile; ?>
<!--    <div class="confirm_delete_message">-->
<!--        <p>Удалить?</p>-->
<!--        <div class="choose">-->
<!---->
<!--                <input form="forma" class="yes" name="yes" type="submit" value="Да">-->
<!--            <button class="no">Нет</button>-->
<!--        </div>-->
<!--    </div>-->
</div>
<script src="CharsCounter.js"></script>
<script src="EditComment.js"></script>
</body>
</html>