<?php
    header("Content-Type: application/json");

    $upload = "Upload/Product/";

    if($_SERVER["REQUEST_METHOD"] !== "POST"){
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

    $productName = $_POST['productName'];
    $productDiscription = $_POST['productDiscription'] ?? '';
    $productPrice = $_POST['productPrice'];
    $categoryId = $_POST['CategoryId'];
    $imageFile = $_FILES["productImage"];

    if (empty($productName) || empty($productDiscription) || $productPrice === '' || empty($categoryId)) {
        echo json_encode(["status"=>"error","message"=>"All product fields are required"]);
        $conn->close();
        exit;
    }

    if(!isset($_FILES["productImage"]) || $_FILES["productImage"]["error"] !== UPLOAD_ERR_OK){
        echo json_encode(["status"=>"error","message"=>"Error in file upload"]);
        $conn->close();
        exit;
    }

    $target_file = $upload.basename($_FILES["productImage"]["name"]);

    if(!move_uploaded_file($imageFile["tmp_name"],$target_file)){
        echo json_encode(["status" => "error" , "Message" => "File Upload Is Not Done.."]);
        $conn->close();
        exit;
    }

    $query = "INSERT INTO products (product_name,description,price,image_url,category_id) VALUES ('$productName','$productDiscription',$productPrice,'$target_file',$categoryId)";
    
    if($result = $conn->query($query)){
        echo json_encode(["status" => "success", "message" => "Product '{$productName}' inserted successfully!"]);
    }else{
        echo json_encode(["status" => "error", "message" => "Error inserting product: "]);
    }

    $conn->close();
?>
