<?php

    if($_SERVER["REQUEST_METHOD"] ==  "POST"){
        
        $conn = mysqli_connect("localhost","root","","temp");
        $dir = "Uploads/";
        $file = $dir.basename($_FILES["myFile"]["name"]);

        if(getimagesize($_FILES["myFile"]["tmp_name"])){
            
            if(move_uploaded_file($_FILES["myFile"]["tmp_name"],$file)){
                echo "File Uploaded ";

                // $query = "INSERT INTO file_upload (path) VALUES ('$file')";
                // if(mysqli_query($conn,$query)){
                //     echo" File Uploded In DataBase .";
                // }else{
                //     echo" Error Occures in File Upload...";
                // }

                $query2 = "SELECT * FROM file_upload WHERE id = 9";
                $data = mysqli_query($conn,$query2);
                $element = mysqli_fetch_assoc($data);
                echo $element["path"];
                echo "<img src='{$element["path"]}' width='200px' hight='10px' />";


            }else{
                echo"File is not Uploaded";
            }
        }else{
            echo"Only Images are allowe";
        }

    }

?>