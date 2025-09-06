<?php

header("Content-type: image/jpeg");
    session_start();

    // create the rendom number and put that number into the session .
    $code = rand(1000,9999);
    $_SESSION["code"] = $code;

    //create the imagr by passing the height and width .
    $height = 20;
    $width = 50;
    $image = imagecreate($width,$height);

    $black_bg = imagecolorallocate($image,0,0,0);
    $white_text = imagecolorallocate($image,255,255,255);
    imagestring($image,5,4,2,$code,$white_text);
    imagejpeg($image);
 ?>