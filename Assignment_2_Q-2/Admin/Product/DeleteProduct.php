<?php
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        echo json_encode(["status" => "error","message" => "Invalid Request..."]);
        exit;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shopping_cart";

    $conn = new mysqli($servername, $username, $password, $database);   

    if($conn->connect_error){
        echo json_encode(["status" => "error" , "message" => "Database Connection Failed ..."]);
        exit;
    }

    $productName = $_POST["productName"];

    if(empty($productName)){
       echo json_encode(["status" => "error", "message" => "All Fields Are Required"]);
        exit; 
    }

    $sql = "DELETE FROM products WHERE product_name = '$productName'";
    $result = $conn->query($sql);

    if($result){
        echo json_encode(["status" => "error", "message" => "Product Deleted Successfully ." ]);
    }else{
        echo json_encode(["status" => "error" , "message" => "Error:" . $conn->error]);
    }

    $conn->close();
?>