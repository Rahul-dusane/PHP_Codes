<?php 
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        echo json_encode(["status" => "error" , "message" => "Invalid Request"]);
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

    $categoryName = $_POST['categoryName'] ?? '';
    $discription = $_POST['discription'] ?? '';

    if(empty($categoryName) || empty($discription)){
        echo json_encode(["status" => "error", "message" => "All Fields Are Required"]);
        exit;
    }

    $sql = "INSERT INTO categories (name,description) values ('$categoryName','$discription')";
    $result = $conn->query($sql);

    if($result){
        echo json_encode(["status" => "error" , "message" => "Category Added Successfully"]);
    }else{
        echo json_encode(["status" => "error" , "message" => "Error:" . $conn->error]);        
    }

    $conn->close();
?>