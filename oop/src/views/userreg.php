<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<h1>SOME TEXT</h1>

<input name="login" type="text" placeholder="login" id="login"><br>
<input name="pass" type="text" placeholder="password" id="pass"><br>
<input name="name" type="text" placeholder="name" id="name">
<button>registration</button>

<script>
   let $ = document.querySelector.bind(document);
   $('button').onclick = ()=>{
       let login = $('#login').value;
       let pass = $('#pass').value;
       let name = $('#name').value;
       let obj = JSON.stringify({
           'login': login,
           'pass': pass,
           'name': name,
       })
       fetch('http://oop/api/reg',{
           method: "POST",
           body: obj
       })
           .then(resp => resp.text())
           .then(data => console.log(data))
$('#login').value = '';
$('#pass').value = '';
$('#name').value = '';
   }
</script>
</body>
</html>