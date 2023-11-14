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
//$db = new mysqli('localhost', 'root', '','shop');
//$req = $db->query("SELECT * FROM `users`");
//$data = $req->fetch_assoc();
    if(isset($_FILES['change_profile_avatar'])){
print_r($_FILES['change_profile_avatar']['tmp_name']);
    }

?>
<a href="index.php">На главную</a>
<form method="POST" enctype="multipart/form-data">
    <div class="user">
        <?php if(isset($_POST['editProfile'])){?>
        <h1 contenteditable="true"><?= $_SESSION['login'] ?></h1>
        <?php }else{ ?>
            <h1 contenteditable="false"><?= $_SESSION['login'] ?></h1>
       <?php }
        ?>
        <div class="avatar">
            <img src="<?= $_SESSION['avatar'] ?>" alt="">
        </div>
        <?php if(isset($_POST['editProfile'])){?>
        <input type="file" name="change_profile_avatar">
        <?php }?>

        <div class="role">Role: <?= $_SESSION['role'] ?></div>
        <?php if(isset($_POST['editProfile'])){?>
            <button name="saveChanges" type="submit">Сохранить изменения</button>
        <?php }else{?>
        <button name="editProfile">Редактировать профиль</button>
        <?php }?>
    </div>
</form>

</body>
</html>