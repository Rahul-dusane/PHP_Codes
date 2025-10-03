<?php


 
    include "Connection.php";
        
        $name = $_POST["name"];
        echo $name;
        $age = $_POST["age"];

        $query = "INSERT INTO ajax (name,age) VALUES ('$name',$age)";

        if(mysqli_query($conn,$query)){
            echo "Query Has Been Processed..";
        }else{
            echo "Query Has Not Been Processed..!";
        }
 

?>