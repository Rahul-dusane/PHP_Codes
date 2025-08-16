<?php

    if(isset($_FILES["myFile"])){
        $target_dir = "C:/xampp/htdocs/PHP_Codes/MovingFile/Uploads";
        $target_file = $target_dir.basename($_FILES["myFile"]["name"]);

        if(file_exists($target_file)){
            
        }
    }

?>