<?php

    if(isset($_FILES["myFile"])){
        $isImage = getimagesize($_FILES["myFile"]["tmp_name"]);

        // echo $isImage;
        // die();

        if($isImage !== false){
            echo "This File Is Image . ";
        }else{
            echo "This File Is Not Image . ";
        }
    }

?>
