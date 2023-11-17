<?php

//var_dump($_POST);
$db = @new mysqli('localhost', 'root', '', 'comment');
if ($db->connect_errno):
    echo 'Error number: ' . $db->connect_errno . '. Reason - ' . $db->connect_error;
endif;
if (isset($_POST['send'])) {
    $time_of_message = date('d-m-Y H:i:s');
    $text_of_message = $_POST['comment'];
    $row = $db->query("INSERT INTO `message`(`user`,`message`, `date`) VALUES ('KotE','$text_of_message','$time_of_message')");
}
if (isset($_GET['save'])) {
    $id = $_GET['delete_id'];
    $new_text = $_GET['message'];
    $req = $db->query("UPDATE `message` SET `user`='KotE',`message`= '$new_text' WHERE `id` = '$id'");
    echo $id . '<br>';
    echo $new_text;
    header('Location: /HomeBase/homeBase.php');
    exit();
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete_id'];
    $db->query("DELETE FROM `message` WHERE `id`='$id'");
    header('Location: /HomeBase/homeBase.php');
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
    while ($row3 = $out->fetch_assoc()): ?>
        <div class="comment_of_user num_<?= $row3['id'] ?>">
            <div class="comment_header">
                <div class="avatar">
                    <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">
                </div>
                <div class="user_name">KotE</div>
                <div class="time"><?= $row3['date'] ?></div>
            </div>
            <form id="forma" method="get" name="showed_mess">
                <input name="delete_id" value="<?= $row3['id']?>" hidden>
                <textarea class="entered_message" maxlength="100"  name="message" readonly><?= $row3['message'] ?></textarea>
            <div class="edit_buttons">
                <input  type="submit" class="save" name="save" value="Сохранить">
                <div class="editBtn">Редактировать</div>
                <input class="delete" type="submit" value="Удалить" name="delete">
            </div>
            </form>
        </div>
    <?php endwhile; ?>

</div>
<script src="CharsCounter.js"></script>
<script src="EditComment.js"></script>
</body>
</html>