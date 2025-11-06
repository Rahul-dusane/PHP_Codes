

<?php
    if(isset($_POST['submit'])){
        $dir = "Uploads/";
        $file = $dir.basename($_FILES['myfile']['name']);

        if(move_uploaded_file($_FILES["myfile"]["tmp_name"],$file)){
            echo "File Uploaded Successfully...."; 
        }else{
            echo "Error In File Upload....";
        }
    }else{
        echo "Submit Button Not Clicked...";
    }
?>