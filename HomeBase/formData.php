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
<form id="myForm">
    <input name="name" type="text" placeholder="name">
    <input name="password" type="text" placeholder="pass">
</form>

<button id="btn" type="submit">click</button>

<script>
    let form = document.querySelector('#myForm')
    let btn = document.getElementById('btn');
    let name = document.querySelector('input[name="name"]');
    let password= document.querySelector('input[name="password"]');

    btn.onclick = e=>{
        e.preventDefault();
        let res = new FormData(form);

        for (const data of res) {
            console.log(data)

        }
    }


</script>

</body>
</html>