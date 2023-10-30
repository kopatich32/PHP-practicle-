<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Comment.css">
    <title>Document</title>
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


    <div class="comment_of_user num_">
        <div class="comment_header">
            <div class="avatar">
                <img width="60" height="60" src="IMG_20231026_001815.jpg" alt="User avatar">
            </div>
            <div class="user_name">KotE</div>
            <div class="time">23-10.2023</div>
        </div>
        <div class="entered_message">aaaaaaaaaaaa</div>
        <div class="edit_buttons">
            <a class="edit" href="?refactor">
                <button name="edit">Редактировать</button>
            </a>
                <button class="admin_del_btn" name="admin_del_btn">Удалить</button>

        </div>
    </div>

    <div class="confirm_delete_message">
        <p>Удалить?</p>
        <div class="choose">

            <button class="yes">Да</button>
            <button class="no">Нет</button>
        </div>
    </div>
    <script>
        let editBtn = document.querySelectorAll('.edit');
        let deleteBtn = document.querySelector('.delete');
        let confirmWindow = document.querySelector('.confirm_delete_message');
        let yes = document.querySelector('.yes');
        let no = document.querySelector('.no');


                let questionBlock = confirmWindow.getBoundingClientRect()
                let questionBlockHeight = confirmWindow.offsetHeight;
                confirmWindow.style.top = questionBlock.top - questionBlockHeight - 20 + window.pageYOffset + 'px';
                confirmWindow.style.left = questionBlock.left - confirmWindow.clientWidth  + 20 + window.pageXOffset  + 'px';


        document.addEventListener('click', event =>{
            if(document.querySelector('.admin_del_btn').contains(event.target)){
                confirmWindow.style.visibility = 'visible';
            }
            else if(!confirmWindow.contains(event.target)){
                confirmWindow.style.visibility = 'hidden';
            }

            })

        // document.addEventListener('click', event=>{
        //     if(!confirmWindow.contains(event.target)){
        //         confirmWindow.style.visibility = 'hidden';
        //     }



    </script>
    <script src="CharsCounter.js"></script>
</div>
</body>
</html>