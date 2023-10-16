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

<form  method="post" enctype="multipart/form-data">
    <input type="file" name="choose_area">
    <input type="submit" value="send">
</form>
<?php
class FileUploader{
public function checkFolder($folder, $inputFIle){
    if(is_dir($folder)){
        return $this->UploadFile($folder, $inputFIle);
    }else{
        mkdir($folder, '0777');
        return $this->UploadFile($folder, $inputFIle);
    }
}
    public function UploadFile($folder, $inputFIle){

        $path_to =  $_FILES[$inputFIle]['name'];
            move_uploaded_file($_FILES[$inputFIle]['tmp_name'], $folder . '/'. $path_to);
    }
}

$init_class = new FileUploader();

$init_class->CheckFolder('FOLDER', 'choose_area');

?>












<!--<h3>Активатор 2023</h3>-->
<!--<h1>https://blog.llinh9ra.ru/софт/активация-phpstorm-webstorm-intellij-idea-и-другие-продукты-jetbrains-в/</h1>-->

</body>
</html>