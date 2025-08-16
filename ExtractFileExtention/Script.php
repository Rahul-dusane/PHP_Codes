<?php

    if(isset($_FILES["myFile"])){
        
        $fileName = basename($_FILES["myFile"]["name"]);
        $fileExtention = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

        echo "File Name : " . $fileName . "<br>";
        echo "File Extention : " . $fileExtention . "<br>";
    }
?>