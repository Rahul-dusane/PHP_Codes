<?php 
   
   header("Content-Type: application/json");

   if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(["status"=>"error", "message"=>"Invalid Request"]);
        exit; 
    }

   //database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "shopping_cart";

    $conn = new mysqli($servername,$username,$password,$database);

    if($conn->connect_error){
        echo json_encode (["status" => "error","message" => "Database connection failed"]);
        exit;
    }

    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    $con_pass = $_POST['confirm_password'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? 'User';
    
    if(empty($user) || empty($pass) || empty($email)){
        echo json_encode (["status" => "error","message" => "All Fields Are Required"]);
        exit;
    }

    if($pass !== $con_pass){
        echo json_encode (["status" => "error","message" => "Password Do Not Match"]); 
        exit; 
    }

    $sql = "INSERT INTO users (username,password,email,role,status,created_at)
            VALUES ('$user','$pass','$email','$role','active',NOW())";

    if($conn->query($sql)){
        echo json_encode (["status" => "success","message" => "User Registered Successfully"]);
    }else{
        echo json_encode (["status" => "error","message" => "Error: ".$conn->error]);
    }

    $conn->close();
    
?>
