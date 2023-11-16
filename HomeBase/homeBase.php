<?php

var_dump($_POST);
$db = @new mysqli('localhost', 'root', '', 'comment');
if ($db->connect_errno):
    echo 'Error number: ' . $db->connect_errno . '. Reason - ' . $db->connect_error;
endif;
////
if (isset($_POST['save'])) {
    $edit_id = @$_POST['val'];
    $text = @$_POST['message'];
    $row = $db->query("UPDATE `message` SET `user`='ololo',`message`= '$text' WHERE `id` = '$edit_id'");
    print_r($edit_id);
}


//////
if (isset($_POST['send'])) {
    $time_of_message = date('d-m-Y H:i:s');
    $text_of_message = $_POST['comment'];
    $row = $db->query("INSERT INTO `message`(`user`,`message`, `date`) VALUES ('lala','$text_of_message','$time_of_message')");
}

//if (isset($_GET['del'])) {
//    $current_id = $_GET['del'];
//    $del = $db->query("DELETE FROM `message` WHERE `id` = $current_id;");
//}

$out = $db->query("SELECT * FROM `message` ORDER BY `id` DESC "); //ASC




if($_POST['del'])
{
    $id = $_POST['val'];
    $db->query("DELETE FROM `message` WHERE `id`='$id'");
    header('Location: /HomeBase/homeBase.php');
}
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
<?php

if(isset($_GET['refactor'])){
    $flag = true;
    $id = $_GET['refactor'];
    $req = $db->query("SELECT * FROM `message` WHERE `id` = '$id'");
    $then = $req->fetch_assoc();
    $comment = @$then['message'];
    echo $comment;
}
if(isset($_POST['save'])){
    $flag = false;
}
?>
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

    while ($row3 = $out->fetch_assoc()) {
        ?>

        <div class="comment_of_user num_<?= $row3['id'] ?>">
            <div class="comment_header">
                <div class="avatar">
                    <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">
                </div>
                <div class="user_name">KotE</div>
                <div class="time"><?= $row3['date'] ?></div>
            </div>
            <form id="form" method="POST" name="showed_mess">
                <input name="val" value="<?= $row3['id'] ?>">
                <input class="entered_message" maxlength="100" name="message" contenteditable="false">

                <br><input type="submit" name="ref" value="ред">
                <input type="submit" name="del" value="дел">
            </form>

<!---->
<!--            <div class="edit_buttons">-->
<!--                    <button form="form" class="save" name="save">Сохранить</button>-->
<!--                    <a class="edit" href="?refactor=--><?php //= $row3['id'] ?><!--">-->
<!--                        <div class="editBtn" name="edit">Редактировать</div>-->
<!--                    </a>-->
<!--                    <div class="delete" name="admin_del_btn">Удалить</div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="confirm_delete_message">-->
<!--            <p>Удалить?</p>-->
<!--            <div class="choose">-->
<!--                <a href="?del=--><?php //= $row3['id']?><!--">-->
<!--                    <button   class="yes" name="yes" type="submit">Да</button>-->
<!--                </a>-->
<!--                <button class="no">Нет</button>-->
<!--            </div>-->
        </div>
    <?php } ?>
</div>

<script src="CharsCounter.js"></script>
<script src="EditComment.js"></script>
</body>
</html>