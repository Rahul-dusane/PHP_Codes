<?php
    header("Content-Type: application/json");

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        echo json_encode(["status" => "error","message" => "Invalid Request"]);
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

    $categoryId = $_POST['Category_Id_Update'] ?? '';
    $categoryName = $_POST['Category_Name_Update'] ?? '';
    $categoryDescription = $_POST['Category_Description_Update'] ?? '';

    
   if (empty($categoryId) || empty($categoryName) || empty($categoryDescription)) {
        echo json_encode(["status" => "error", "message" => "All Fields Are Required"]);
        exit;
    }

    $sql_select = "SELECT * FROM categories WHERE category_id = '$categoryId'";
    $check = $conn->query($sql_select);

    if($check->num_rows > 0){
        $sql_update =  "UPDATE categories SET name = '$categoryName', description = '$categoryDescription' WHERE category_id = '$categoryId'";
        
        if($conn->query($sql_update)){
            echo json_encode(["status" => "success", "message" => "Category updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Update failed: " . $conn->error]);
        }
    }else{
        echo json_encode(["status" => "error", "message" => "Category ID does not exist"]);
    }

    $conn->close();
?>