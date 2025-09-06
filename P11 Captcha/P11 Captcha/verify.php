<?php
session_start();
// print_r($_REQUEST);
// echo $_SESSION["code"];
if($_POST["cpatcha"] == $_SESSION["code"]){
    echo "Captcha is correct";
} else {
    echo "Captcha is not correct";
}
?>