<?php
    session_start();
    $code = dechex(rand(10000,99999));
    $_SESSION["code"] = $code;

    $height = 20;
    $width = 50;
    $image = imagecreate($width,$height);

    $bg = imagecolorallocate($image,0,0,0);
    $text_color = imagecolorallocate($image,255,255,255);
    imagestring($image,5,4,2,$code,$text_color);
    imagejpeg($image);

?>