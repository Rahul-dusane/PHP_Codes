<?php
    if(isset($_POST["name"]) && isset($_POST["email"])){
        $u = $_POST["name"];
        $e = $_POST["email"];
        echo "Recived Name : $u\nRecived Email : $e\n";
    }
?>