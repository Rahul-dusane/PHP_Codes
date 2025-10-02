<?php
    if(isset($_POST["submit"])){
        $captch_code = $_POST["Captch"];

        session_start();
        if($_SESSION["code"] == $captch_code){
            echo "<h2>Captch Has Been Validated..";
            exit;
        }else{
            echo "<h2>Captch Has not Been Validated..";
            exit;
        }
        session_abort();
    }
?>