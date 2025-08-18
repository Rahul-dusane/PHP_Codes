<?php
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        echo json_encode(["status" => "error","meesage" => "Invalid Request"]);
        exit;
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shopping_cart";

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn->connect_error){
        echo json_encode(["status" => "error", "message" => "Database connection failed"]);
        exit;
    }

    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if(empty($user) || empty($pass)){
        echo json_encode(["status" => "error", "message" => "All Fields Are Required"]);
        exit;
    }

    $sql = "SELECT username,password FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        echo json_encode(["status" => "success", "message" => "Login Successful"]);
    }else{
        echo json_encode(["status" => "error", "message" => "Invalid Username or Password"]);
    }

    $conn->close();
?>