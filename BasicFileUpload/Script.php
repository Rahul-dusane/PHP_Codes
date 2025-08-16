
<?php
    if(isset($_FILES["myFile"])){
        echo "Orignal File Name : " . $_FILES["myFile"]["name"]."<br>";
        print_r("Temp File : " . $_FILES["myFile"]["tmp_name"]."<br>");
        echo "File Size : " . $_FILES["myFile"]["size"]."<br>"; 
    }
?>