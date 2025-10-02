<?php

    $server = "localhost";
    $database = "student_mgmt";
    $user = "root";
    $pass = "";
    $conn = mysqli_connect($server,$user,$pass,$database);

    if($conn){
        echo "Connected";
    }else{
        echo "Not Connected";
    }

?>