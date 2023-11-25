<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="wrapper">
    <input id="login" class="clear" type="text" placeholder="login">
    <input id="pass" class =clear type="text" placeholder="pass">
    <input id="name" class =clear type="text" placeholder="name">
    <input id="email" class="clear" type="text" placeholder="email">
    <button class="button">send</button>
</div>
<script>
    let $ = document.querySelector.bind(document);
    let btn = $('.button');

    btn.addEventListener('click', ()=>{
        let login = $('#login').value;
        let pass = $('#pass').value;
        let name = $('#name').value;
        let email = $('#email').value;
        let obj = JSON.stringify({
            'action': 'reg',
            'payload': {
                'login': login,
                'pass': pass,
                'name': name,
                'email': email,
            }
        });
        let inputs = document.querySelectorAll('.clear');
        inputs.forEach(item=> item.value = null)
        let url = "http://php-practicle-/HomeBase/ExampleNoReload/script.php";
        fetch(url,{
            method: 'POST',
            body: obj,
        })
            .then(resp => resp.json())
            .then(data => console.log(data))
        console.log(obj)

    })
</script>
</body>
</html>