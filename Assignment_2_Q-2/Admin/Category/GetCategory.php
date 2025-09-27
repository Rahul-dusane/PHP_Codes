<?php
    header("Content-Type: application/json");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shopping_cart";

    $conn = new mysqli($servername, $username, $password, $database);   

    if($conn->connect_error){
        echo json_encode(["status" => "error" , "message" => "Database Connection Failed ..."]);
        exit;
    }

    $query = "SELECT category_id ,name FROM category ORDER BY name";
    $result = $conn->query($query);

    $arr = [];

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $arr[] = $row; 
        }
        
    }else{
         echo json_encode(["status" => "error" , "message" => "Category Are Not Found..."]);
    }
    $conn->close();
?>