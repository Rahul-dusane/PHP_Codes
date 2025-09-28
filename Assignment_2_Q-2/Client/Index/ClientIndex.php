<?php
header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$database = "shopping_cart";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

// ADD THIS NEW CODE BLOCK:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    
    // Check if product already exists in cart
    $checkSql = "SELECT cart_id, quantity FROM cart WHERE username = 'guest' AND product_id = $productId";
    $checkResult = $conn->query($checkSql);
    
    if ($checkResult && $checkResult->num_rows > 0) {
        // Product exists - update quantity
        $existingItem = $checkResult->fetch_assoc();
        $newQuantity = $existingItem['quantity'] + $quantity;
        $updateSql = "UPDATE cart SET quantity = $newQuantity WHERE cart_id = {$existingItem['cart_id']}";
        
        if ($conn->query($updateSql)) {
            echo json_encode(["status" => "success", "message" => "Cart updated - Total quantity: $newQuantity"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update cart"]);
        }
    } else {
        // New product - insert new row
        $insertSql = "INSERT INTO cart (username, product_id, quantity) VALUES ('guest', $productId, $quantity)";
        
        if ($conn->query($insertSql)) {
            echo json_encode(["status" => "success", "message" => "Product added to cart"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to add to cart"]);
        }
    }
    
    $conn->close();
    exit;
}
// END OF NEW CODE BLOCK

// YOUR EXISTING CODE STARTS HERE (don't change anything below):
if(isset($_GET["product_id"])){
    $id = intval($_GET['product_id']);
    $res = $conn->query("SELECT * FROM products WHERE product_id = $id");
    
    if($res && $res->num_rows > 0){
        $p = $res->fetch_assoc();
        $p['image_url'] = '../../Admin/Product/Upload/Product/' . basename($p['image_url']);
        echo json_encode(["status" => "success", "data" => $p]);
    }else{
        echo json_encode(["status" => "error" , "message" => "Products Not Found..."]);
    }
    $conn->close();
    exit;
}

    $categories = [];
    $result = $conn->query("SELECT * FROM categories ORDER BY name");

    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $catId = $row["category_id"];
            $prodResult = $conn->query("SELECT product_id,product_name FROM products WHERE category_id = $catId");
            
            $products = [];
            
            while($prod = $prodResult->fetch_assoc()){
                $products[] = $prod;
            }

            $row['products'] = $products;
            $categories[] = $row;
        }
        echo json_encode(["status" => "success", "data" => $categories]);
    }else{
        echo json_encode(["status" => "error", "message" => "No categories found"]);
    }
    $conn->close();
?>