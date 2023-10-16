<?php
?>
<pre>
    <?php
    // $str = 'This is an encoded string';
    // $str2 = base64_encode($str);
    // echo base64_encode($str);
    // echo base64_decode($str2);


// var_dump($_FILES);
// if(!empty($_FILES))
// {
//     $udir = 'files/';
//     $uploadfile = $udir . $_FILES['ufile']['name'];
//     echo $uploadfile;
    
//     if (move_uploaded_file($_FILES['ufile']['tmp_name'], $uploadfile)) {
//         echo "Файл корректен и был успешно загружен.\n";
//     }
    
// }
include 'FileWorker.php';
$fw = new FileWorker();

if(!empty($_FILES))
{
    $status = $fw->UploadFileForm('llala','ufile');
    var_dump($status);
    if($status)
    {
        echo 'Файл загружен';
    }
    else
    {
        echo 'не-а';
    }
}

?>
</pre>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="ufile" id="">
        <input type="submit" value="отправить">
    </form>
