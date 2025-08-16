<?php
    if(isset($_FILES["myFile"])){
        $_target_dir = "Uploads/";
        $_target_file = $_target_dir.basename($_FILES["myFile"]["name"]);

        if(move_uploaded_file($_FILES["myFile"]["tmp_name"],$_target_file)){
            echo "The File Is Successfully Uploaded";
        }else{
            echo "File Is Not Uploaded";
        }
    }
?>