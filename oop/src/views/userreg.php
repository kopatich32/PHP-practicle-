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
<h1>SOME TEXT</h1>

<input type="text" placeholder="login" id="login"><br>
<input type="text" placeholder="password" id="pass"><br>
<button>registration</button>

<script>
   let $ = document.querySelector.bind(document);
   $('button').onclick = ()=>{
       let login = $('#login').value;
       let pass = $('#pass').value;
       let obj = JSON.stringify({
           'login': login,
           'pass': pass,
       })
       fetch('http://oop/api/reg', {
           method: "POST",
           body: obj
       })
           .then(resp => resp.text())
           .then(data => console.log(data))
   }
</script>
</body>
</html>