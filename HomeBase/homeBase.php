<?php
$db = @new mysqli('localhost', 'root', '', 'comment');
if ($db->connect_errno):
    echo 'Error number: ' . $db->connect_errno . '. Reason - ' . $db->connect_error;
endif;
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
    <link rel="icon" href="upload/backgroundAbout">

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

<!--    --><?php
//    while ($row3 = $out->fetch_assoc()):?>
<!--        <div class="comment_of_user" data-num="--><?php //=$row3['id'] ?><!--">-->
<!--            <input name="val" value="--><?php //= $row3['id'] ?><!--" hidden>-->
<!--            <div class="comment_header">-->
<!--                <div class="avatar">-->
<!--                    <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">-->
<!--                </div>-->
<!--                <div class="user_name">KotE</div>-->
<!--                <div class="time">--><?php //= $row3['date'] ?><!--</div>-->
<!--            </div>-->
<!--            <div class="entered_message" contenteditable="false">--><?php //= $row3['message'] ?><!--</div>-->
<!--            <div class="edit_buttons">-->
<!--                <button class="editBtn">Редактировать</button>-->
<!--                <button class="save">Сохранить</button>-->
<!--                <button class="delete">Удалить</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    --><?php //endwhile; ?>


    <div class="confirm_wrapper">
        <div class="confirm_delete_message">
            <p>Удалить?</p>
            <div class="choose">
                    <button class="yes">Да</button>
                <button class="no">Нет</button>
            </div>
        </div>
    </div>
</div>
<script>
    let $ = document.querySelector.bind(document);

    $('.send').addEventListener('click', event => {
        event.stopPropagation();
        let textOfMessage = $('#message').value;
        let objMessage = JSON.stringify({
            'message': {'text': textOfMessage},
        })
        console.log(objMessage)
        fetch('formData.php', {
            method: 'POST',
            body: objMessage,
        })
            .then(resp => resp.json())
            .then(data =>
                showResponse(data))
        $('#message').value = null;
        $('.counter').innerText = $('#message').getAttribute('maxlength');
    })

    function showResponse(req) {
        console.log(req)
        let newMessage = `
<div class="comment_of_user data-num="${req.id}">
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
        $('.container').insertAdjacentHTML("beforeend", newMessage);
        let allBTN = document.querySelectorAll('.delete');
        allBTN.forEach(delBtn => {
            delBtn.addEventListener("click", (event) => {
                if (delBtn.contains(event.target)) {
                    event.stopPropagation()
                    event.preventDefault()
                    confirmWindow.classList.add('shows2')
                    let thisCoords = delBtn.getBoundingClientRect();
                    confirmWindow.style.top = thisCoords.top - confirmWindow.offsetHeight - window.pageYOffset + window.scrollY - 84 + 'px';
                    confirmWindow.style.left = thisCoords.left - delBtn.offsetWidth / 2 + window.pageXOffset + window.scrollX + 'px';
                }
                let thisCoords = delBtn.getBoundingClientRect();
                confirmWindow.style.top = thisCoords.top - confirmWindow.offsetHeight - window.pageYOffset + window.scrollY - 84 + 'px';
                confirmWindow.style.left = thisCoords.left - delBtn.offsetWidth / 2 + window.pageXOffset + window.scrollX + 'px';
            })
            no.addEventListener('click', () => {
                confirmWindow.classList.remove('shows2');
                confirmWindow.style.display = 'block'
            })
        })
    }

    let allSaveBtns = document.querySelectorAll('.save');
    allSaveBtns.forEach(btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
            let changeID = event.target.closest('.comment_of_user').dataset.num;
            let time = event.target.closest('.comment_of_user').querySelector('.time').innerText;
            console.log(time)
            console.log(changeID)
            let editedMessage = event.target.closest('.edit_buttons').previousElementSibling.innerText;
            let newMess = JSON.stringify({
                'edited': {'message': editedMessage, 'changeID': changeID, 'time': time}
            });
            fetch('editMess.php', {
                method: 'POST',
                body: newMess,
            })
                .then(resp => resp.json())
                .then(data => console.log(data))
        })
    })

    document.addEventListener('DOMContentLoaded', ()=>{
        fetch('getExistMessage.php',{
            method: 'POST',
            body: JSON.stringify({'answer':{'rows': 'lala'}})
        })
            .then(response => response.json())
            .then(data =>
            existMess(data))
    })

    function existMess(mess){
        console.log(mess)
        for(let i = 0; i< mess.length; i++){
            let message = `
        <div class="comment_of_user" data-num="${mess[i].id}">
            <input name="val" value="${mess[i].id}" hidden>
            <div class="comment_header">
                <div class="avatar">
                    <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">
                </div>
                <div class="user_name">KotE</div>
                <div class="time">${mess[i].date}</div>
            </div>
            <div class="entered_message" contenteditable="false">${mess[i].message}</div>
            <div class="edit_buttons">
                <button class="editBtn">Редактировать</button>
                <button class="save">Сохранить</button>
                <button class="delete">Удалить</button>
            </div>
        </div>`
            $('.comment_wrapper').insertAdjacentHTML("afterend", message);
        }
    }
</script>

<script src="CharsCounter.js"></script>
<script src="EditComment.js"></script>
</body>
</html>