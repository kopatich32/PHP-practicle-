<?php
$db = @new mysqli('localhost', 'root', '', 'comment');
if ($db->connect_errno):
    echo 'Error number: ' . $db->connect_errno . '. Reason - ' . $db->connect_error;
endif;
////
//    $text = @$_GET['message'];
//    print_r(@$_POST['message']);

//if (isset($_POST['message'])) {
//    $edit_id = $_GET['refactor'];
//    $text = @$_POST['message'];
//    print_r(@$_POST['message']);
//    print_r($edit_id);
//    print_r($_GET['refactor']);
//    $row = $db->query("UPDATE `message` SET `user`='ololo',`message`= '$text' WHERE `id` = 410");
//}

if (isset($_GET['refactor'])) {
    $edit_id = $_GET['refactor'];
//    $text = @$_POST['message'];
//    print_r(@$_POST['message']);
//    print_r($edit_id);
    print_r($_GET['refactor']);
//    $row = $db->query("UPDATE `message` SET `user`='ololo',`message`= '$text' WHERE `id` = '$edit_id'");
}




//////
    $time_of_message = date('d-m-Y H:i:s');

if (isset($_GET['del'])) {
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
            <textarea id="message" placeholder="Комментарий" maxlength="100"></textarea>
            <div class="buttons">
                <button class="close">Закрыть</button>
                <button class="send">Отправить</button>
                <div id="out"></div>
            </div>
    </div>

    <?php
    while ($row3 = $out->fetch_assoc()):?>
        <div class="comment_of_user num_<?= $row3['id'] ?>">
            <input name="val" value="<?= $row3['id'] ?>" hidden>
            <div class="comment_header">
                <div class="avatar">
                    <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">
                </div>
                <div class="user_name">KotE</div>
                <div class="time"><?= $row3['date'] ?></div>
            </div>
                <div class="entered_message" contenteditable="false"><?= $row3['message'] ?></div>
            <div class="edit_buttons">
                <button class="editBtn">Редактировать</button>
                    <button class="save">Сохранить</button>
                    <button class="delete" >Удалить</button>
            </div>
        </div>
    <?php endwhile; ?>
    <div class="confirm_wrapper">
        <div class="confirm_delete_message">
            <p>Удалить?</p>
            <div class="choose">
                <a href="?del=<?= $row3['id'] ?>">
                    <button class="yes">Да</button>
                </a>
                <button class="no">Нет</button>
            </div>
        </div>
    </div>
</div>

<script>

    let $ = document.querySelector.bind(document);
    $('.send').addEventListener('click', event=>{
        event.stopPropagation();
        let textOfMessage = $('#message').value;
        let objMessage = JSON.stringify({
            'message': {'text': textOfMessage},
        })
        console.log(objMessage)
        fetch('formData.php',{
            method: 'POST',
            body: objMessage,
        })
            .then(resp => resp.json())
            .then(data =>
                showResponse(data))
        $('#message').value = null;
        $('.counter').innerText = $('#message').getAttribute('maxlength');
    })
    function showResponse(req){
        console.log(req)
      let newMessage =  `
<div class="comment_of_user num_${req.id}">
            <div class="comment_header">
                <div class="avatar">
                    <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">
                </div>
                <div class="user_name">KotE</div>
                <div class="time">${req.time}</div>
            </div>
                <div class="entered_message" contenteditable="false">${req.result.text}</div>
            <div class="edit_buttons">
                <button class="editBtn">Редактировать</button>
                    <button class="save">Сохранить</button>
                    <button class="delete">Удалить</button>
            </div>
        </div>
`
        $('.comment_wrapper').insertAdjacentHTML("afterend", newMessage);

        let allBTN = document.querySelectorAll('.delete');
        allBTN.forEach(delBtn=>{
                delBtn.addEventListener("click", ()=>{
                    confirmWindow.classList.add("vvisible");
                    let thisCoords = delBtn.getBoundingClientRect();
                    confirmWindow.setAttribute('title', 'bugaga')
                    confirmWindow.style.top = thisCoords.top - confirmWindow.offsetHeight - window.pageYOffset + window.scrollY- 84 + 'px';
                    confirmWindow.style.left = thisCoords.left - delBtn.offsetWidth / 2 + window.pageXOffset + window.scrollX + 'px';
                    console.log(delBtn + '  есть контакт')
                })
                // let thisCoords = delBtn.getBoundingClientRect();
                // confirmWindow.classList.add("visible")
                // confirmWindow.style.top = thisCoords.top - confirmWindow.offsetHeight - window.pageYOffset + window.scrollY- 84 + 'px';
                // confirmWindow.style.left = thisCoords.left - delBtn.offsetWidth / 2 + window.pageXOffset + window.scrollX + 'px';

        })
    }
</script>
<script src="CharsCounter.js"></script>
<script src="EditComment.js"></script>
</body>
</html>