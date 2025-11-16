<?php

    session_start();
    $code = rand(1000,9999);
    $_SESSION["code"] = $code;

    $width = 80;
    $height = 30;

    header("Content-type: image/jpeg");
    $image = imagecreate($width,$height);
    $bg_color = imagecolorallocate($image,0,0,0);
    $font_color = imagecolorallocate($image,255,255,255);
    imagestring($image,5,10,8,$code,$font_color);
    imagejpeg($image);

?>