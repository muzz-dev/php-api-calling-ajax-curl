<?php
session_start();
    header("Content-Type: image/png");
    $im = @imagecreate(110, 40)
        or die("Cannot Initialize new GD image stream");

    //for background color
    $background_color = imagecolorallocate($im, 100,0,0);

    //text color
    $text_color = imagecolorallocate($im, 255,255,0);

    //create random number and store in session
    $no = rand(111111,999999);
    $_SESSION["captcha"] = $no;
    imagestring($im, 15, 15, 15,  $no, $text_color);
    imagepng($im);
    imagedestroy($im);
?>