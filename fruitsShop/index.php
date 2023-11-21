<?php
session_start();

require('connect.php');
include('updateValue.php');
function show($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
//show($_SESSION['auth']);
//LogUp
if(isset($_POST['logup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $file = $_FILES['file'];
    $role = 'user';
    $path = '/photos/';
    $upload = $path . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $upload);
    $row = $db->query("INSERT INTO `users`(`login`, `pass`, `email`, `name`, `photo`, `role`) VALUES ('$login','$password','$email','$name','$upload','$role')");
}
//
//Login
$authLog = @$_POST['AuthLogin'];
$authPass = @$_POST['AuthPassword'];
$for_profile = $db->query("SELECT * FROM `users` WHERE `login` = '$authLog' AND `pass` = '$authPass'");
if($for_profile->num_rows > 0){
    $row1 = $for_profile->fetch_assoc();
    $_SESSION['auth'] = true;
    $_SESSION['avatar'] = $row1['photo'];
    $_SESSION['login'] = $row1['login'];
    $_SESSION['role'] =$row1['role'];
    header('Location: noreload.php');

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="mainPage.css">
</head>
<body>
<header>
<?php
$req1 = $db->query("SELECT * FROM `goods`");

$login = @$_SESSION['login'];
$req = $db->query("SELECT * FROM `users` WHERE `login` = '$login'");
$data =$req->fetch_assoc();


if(isset($_SESSION['auth']) == true){?>
    <a href="disconect.php" class="exit">
        <button>exit</button>
    </a>
<?php } ?>
    <div class="cart" title="Корзина"></div>
    <div class="buy">Купить</div>
    <?php if(isset($_SESSION['auth']) == true) {?>
    <a href="UserProfile.php" class="user_card">
        <div class="avatar">
            <img src="<?=$data['photo'] ?>" alt="picture">
        </div>
        <div class="current_user">
            <span class="login"><?=$_SESSION['login'] ?></span>
            <span class="role"><?=$_SESSION['role'] ?></span>
        </div>
    </a>
    <?php }
    if(isset($_SESSION['auth']) !== true){?>

    <a class="profile" >
        <div>logIn/logUp</div>
    </a> <?php }?>
</header>

<?php
if(@$_GET['delete']):
    $delID = $_GET['delete'];
    $forDelPicture = $db->query("SELECT * FROM `goods` WHERE `id` = '$delID'");
    if($result =$forDelPicture->fetch_assoc()):
        $str = $result['photo'];
        unlink($str);
    endif;
    $delReq = $db->query("DELETE FROM `goods` WHERE `id` = '$delID'");
 header('Location: noreload.php');
 exit();
endif;
?>
<div class="card_wrapper">
    <?php
while($row = $req1->fetch_assoc()){?>
    <div class="card">
        <?php if(@$_SESSION['role'] === 'admin'): ?><a href="?delete=<?=$row['id'] ?>">
            <div class="delCard">X</div>
        </a> <?php endif; ?>
        <p><?= $row['name']?></p>
        <div class="picture">
            <img src="<?= $row['photo'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>">
        </div>
        <p class="cost">Цена: <?= $row['cost']?> р.</p>
        <p class="amount">Остаток: <span class="db_amount"><?= $row['amount']?></span></p>
        <div class="counter_cart">
            <button class="leftArrow" data-action="minus">-</button>
            <input style="width: 30px;text-align: center" class="counter" data-counter value="0" name="amount">
            <button class="rightArrow" data-action="plus">+</button>
        </div>
        <button class="addCart">Добавить в корзину</button>
    </div>
<?php } ?>
</div>
<div class="reg_wrapper">
        <form class="registration" name="form" method="POST" enctype="multipart/form-data">
            <div class="first_row"><input type="text" placeholder="name" name="name">
                <input type="text" placeholder="Login" name="login"></div>
            <div class="second_row"><input type="email" placeholder="email" name="email">
                <input type="password" placeholder="password" name="password"></div>
            <button class="logup" type="submit" name="logup">Log up</button>
            <div class="reg">Регистрация</div>
            <div class="has_profile">Есть профиль?</div>
            <div class="label">
                <label>
                    <input class="file" type="file" name="file">
                    <span>фото</span>
                </label>
                <span id="path"></span>
            </div>
        </form>
</div>
<div class="auth_wrapper">
    <form method="POST" name="authForm" class="authForm">
        <div class="fields">
            <input type="text" placeholder="Login" name="AuthLogin">
            <input type="password" placeholder="password" name="AuthPassword">
        </div>
        <button name="AuthEnter">Login</button>
        <div class="login_title">Войти</div>
</form>
</div>
<script src="scripts.js"></script>


</body>
</html>