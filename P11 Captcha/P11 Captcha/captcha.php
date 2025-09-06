<?php
session_start();
$code = rand(1000,9999);
// echo $code;
$_SESSION["code"] = $code;

// echo $_SESSION["code"];

$height = 20;
$width = 50;
$image = imagecreate($width,$height);

$black_bg = imagecolorallocate($image,0,0,0);
$textcolor = imagecolorallocate($image,255,255,255);
imagestring($image,5,4,2,$code,$textcolor);
imagejpeg($image);
?>