<?php
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];

    echo htmlspecialchars($name);
    echo htmlspecialchars($age);
    echo htmlspecialchars($email);
    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
?>