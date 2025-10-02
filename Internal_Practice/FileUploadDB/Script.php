<?php

    include "Connection.php";

    if(isset($_POST["submit"])){
        $dir = "Upload/";
        // $file = $dir.basename($_FILES["fileToUpload"]["name"]);
        $total = count($_FILES["fileToUpload"]["tmp_name"]);

        for($i = 0; $i < $total; $i++){
            
            $file = $dir.basename($_FILES["fileToUpload"]["name"][$i]);
            if(getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]) === false){
                echo "Only Image File Are Allowed..";
                exit;
            }

            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i],$file)){
                echo "File Is Uploaded...";
            }else{
                echo "Error In File Upload...";
            }
            
            $query = "INSERT INTO file_upload (path) VALUES ('$file')";

            if(mysqli_query($conn,$query)){
                echo "Query has been processed";
            }else{
                echo "Query has not been processed";
            }
            
            
        }

        

        // $query = "INSERT INTO file_upload (path) VALUES ('$file')";

        // if(mysqli_query($conn,$query)){
        //     echo "Query has been processed";
        // }else{
        //     echo "Query has not been processed";
        // }

    }

?>