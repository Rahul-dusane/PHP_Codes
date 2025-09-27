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

    $query = "SELECT category_id ,name FROM categories ORDER BY name";
    $result = $conn->query($query);

    if(!$result){
        echo json_encode(["status" => "error" , "message" => "Query failed: " . $conn->error]);
        $conn->close();
        exit;
    }


    $arr = [];

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $arr[] = $row; 
        }
        echo json_encode(["status" => "success", "categories" => $arr]);
        
    }else{
        echo json_encode(["status" => "error" , "message" => "Category Are Not Found..."]);
    }
    $conn->close();
?>