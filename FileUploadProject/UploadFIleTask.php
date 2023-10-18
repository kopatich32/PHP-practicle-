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
 function checkFolder($folder, $inputFIle){
    if(is_dir($folder)){
        return $this->UploadFile($folder, $inputFIle);
    }else{
        mkdir($folder, '0777');
        return $this->UploadFile($folder, $inputFIle);
    }
}
     function UploadFile($folder, $inputFIle){
        date_default_timezone_set('Europe/Moscow');
        $Full_year = ['Января' , 'Февраля' , 'Марта' , 'Апреля' , 'Мая' , 'Июня' , 'Июля' , 'Августа' , 'Сентября' , 'Октября' , 'Ноября' , 'Декабря'];
        $date = getdate()['mon'];
        $currentHour = getdate()['hours'];
        $translateMonth = $Full_year[$date -1] ;
        $timeStamp = date("d $translateMonth Y, $currentHour:i:s") . ' File name: ' . $_FILES[$inputFIle]['name'] . "\n";
$log_file_name = "$folder/Log_of_update.txt";
        file_put_contents($log_file_name, $timeStamp , FILE_APPEND);
        $path_to =  $_FILES[$inputFIle]['name'];
            move_uploaded_file($_FILES[$inputFIle]['tmp_name'], $folder . '/'. $path_to);
 }

}

$init_class = new FileUploader();
$init_class->CheckFolder('FOLDER', 'choose_area');
$fileName =  $_FILES['choose_area']['name'] . '<br>';
//echo $_SERVER['DOCUMENT_ROOT'] . "\\$fileName";
?>












<!--<h3>Активатор 2023</h3>-->
<!--<h1>https://blog.llinh9ra.ru/софт/активация-phpstorm-webstorm-intellij-idea-и-другие-продукты-jetbrains-в/</h1>-->

</body>
</html>