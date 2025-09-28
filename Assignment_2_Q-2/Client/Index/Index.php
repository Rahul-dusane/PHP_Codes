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

    if(isset($_GET["product_id"])){
        $id = intval($_GET['product_id']);
        $res = $conn->query("SELECT * FROM products WHERE id = $id");
        
        if($res && $res->num_rows > 0){
            $p = $res->fetch_assoc();
            echo json_encode(["status" => "success", "data" => $p]);
        }else{
            echo json_encode(["status" => "errpr" , "message" => "Products Not Found..."]);
        }
        $conn->close();
        exit;
    }

    $categories = [];
    $result = $conn->query("SELECT * FROM categories ORDER BY name");

    if($result && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $catId = $row["id"];
            $prodResult = $conn->query("SELECT product_id, product_name FROM products WHERE category_id = $catId");
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