<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="UserProfile.css">
</head>
<body>
<?php
if($_SESSION['auth'] != true){
header('Location: errorpage.php');
}
// Change avatar
$db = new mysqli('localhost', 'root', '', 'shop');
$login = $_SESSION['login'];
$req = $db->query("SELECT * FROM `users` WHERE `login` = '$login'");
$data = $req->fetch_assoc();
if (isset($_FILES['change_profile_avatar'])) {
    $localPath = 'photos/';
    unlink($data['photo']);
    $fullPath = $localPath . basename($_FILES['change_profile_avatar']['name']);
    if (move_uploaded_file($_FILES['change_profile_avatar']['tmp_name'], $fullPath)) {
        echo '<br>' . 'file successfully was uploaded' . '<br>';
        $update = $db->query("UPDATE `users` SET `photo`='$fullPath'  WHERE `login` = '$login'");
        header('Location: UserProfile.php');
    }
} ?>
<a href="index.php">На главную</a>
<form name="profile" method="POST" enctype="multipart/form-data">
    <div class="user">
        <label>Редактировать профиль</label>

        <?php if (isset($_POST['editProfile'])) { ?>
            <h1 contenteditable="true"><?= $_SESSION['login'] ?></h1>
        <?php } else { ?>
            <h1 contenteditable="false"><?= $_SESSION['login'] ?></h1>
        <?php } ?>
        <div class="avatar">
            <img src="<?= $data['photo'] ?>" alt="">
        </div>
        <?php if (isset($_POST['editProfile'])) { ?>
            <input type="file" name="change_profile_avatar">
        <?php } ?>

        <div class="role">Role: <?= $_SESSION['role'] ?></div>
        <?php if (isset($_POST['editProfile'])) { ?>
            <button name="saveChanges" type="submit">Сохранить изменения</button>
        <?php } else { ?>
            <button name="editProfile">Редактировать профиль</button>
        <?php } ?>
    </div>
</form>
<?php


$goods= @$_POST['goods'];
$left= @$_POST['left'];
$cost= @$_POST['cost'];

if(isset($_POST['sendGoods']) && $_FILES['photoOfGoods']){

    $Path = 'goods/' . basename($_FILES['photoOfGoods']['name']);
    move_uploaded_file($_FILES['photoOfGoods']['tmp_name'], $Path);
    $sendGoods = $db->query("INSERT INTO `goods`( `name`, `cost`, `amount`, `photo`) VALUES ('$goods','$cost','$left','$Path')");
    var_dump($sendGoods);
}
?>

<div class="addGoods">
    <h3>Добавить новый товар</h3>
    <form name="add" method="POST" enctype="multipart/form-data">
        <input type="text" placeholder="Товар" name="goods">
        <div class="photo">
            <img src="" alt="">
        </div>
        <input  class="photoGood" type="file" placeholder="Фото" name="photoOfGoods">

        <input type="text" placeholder="Цена" name="cost">
        <input type="text" placeholder="Остаток на складе" name="left">
        <input type="submit" value="Добавить в БД" name="sendGoods">
    </form>
</div>
<script>
    let img = document.querySelector('.photoGood');
    img.onchange = ()=>{
        let fileName = img.files[0];
        img.previousElementSibling.querySelector('img').setAttribute('src', URL.createObjectURL(fileName))
        console.log(fileName)

    }
</script>
</body>
</html>