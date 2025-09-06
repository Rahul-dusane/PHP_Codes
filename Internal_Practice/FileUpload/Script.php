<?php
    if(isset($_FILES["myFile"])){
        $_target_dir = "Upload/";
        $_target_file = $_target_dir.basename($_FILES["myFile"]["name"]);
        $flage = 0;

        $isImage = getimagesize($_FILES["myFile"]["tmp_name"]);
        if($isImage !== false){
            $flage = 1;
        }else{
            $flage = 0; 
            // exit();
            echo "<br>" . "File Is Not Image Type ...";
        }

        if($_FILES["myFile"]["size"] > 500000){
            $flage = 0;
            echo "<br>" . "File Is Too Large To Upload...";
        }else{
            $flage = 1;
        }

        if(move_uploaded_file($_FILES["myFile"]["tmp_name"],$_target_file) && $flage === 1){
            echo "File Is SucessFully Uploaded...";
        }else{
            echo "<br>" . "File Is Not Uploaded...";
        }
    }
?>