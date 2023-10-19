<?php

class FileWorker{

    public function UploadFileForm($directory, $keyInput){
        if(!empty($_FILES)) {
            if(is_dir($directory)) {
               return $this->Uploader($directory,$keyInput);
            }
            else {
                mkdir($directory,'0777');
                return $this->Uploader($directory, $keyInput);
            }
        }
    }


    public function Uploader($directory, $keyInput){
        $uploadfile = $directory.'/'. $_FILES[$keyInput]['name'];
        if (move_uploaded_file($_FILES[$keyInput]['tmp_name'], $uploadfile)) {
            
            return true;
        }
        else {
            return false;
        }
    }

}

