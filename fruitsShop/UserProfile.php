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
    }
}
?>

<a href="index.php">На главную</a>
<form method="POST" enctype="multipart/form-data">
    <div class="user">
        <?php if (isset($_POST['editProfile'])) { ?>
            <h1 contenteditable="true"><?= $_SESSION['login'] ?></h1>
        <?php } else { ?>
            <h1 contenteditable="false"><?= $_SESSION['login'] ?></h1>
        <?php }
        ?>


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

</body>
</html>