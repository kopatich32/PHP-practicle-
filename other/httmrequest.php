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
<form enctype="multipart/form-data" method="POST" name="form">
    <input class="fileInput" type="file">
    <input type="submit" value="push">
    <progress class="progress" value="70" max="100">
        <span class="uploadFormStatus"></span>
    </progress>
</form>

<script>
    let $ = document.querySelector.bind(document);
    let form = document.form.form
    let fileToUpload = $('.fileInput');
    let progress = $('.progress');
    let loadedFile = fileToUpload.files[0];
    let formStatus = $('.uploadFormStatus');
    let formData = new FormData();
    let xhr = new XMLHttpRequest();
    formData.append('file', loadedFile);
    xhr.addEventListener('load',loadHandler, false);
    function loadHandler(event){
        formStatus.textContent = event.target.responseText;
    }

    console.log(progressBar)
    fileToUpload.onchange = e=>{
        console.log(fileToUpload.files[0])
        console.log(formData)

    }


</script>
</body>
</html>