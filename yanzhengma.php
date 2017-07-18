<?php
header('content-type:image/png');
session_start();
$image = imagecreatetruecolor(120, 60);
$color = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $color);
$str = 'abcdefghkmnpqrstuvwxyz';
$chars = substr(str_shuffle($str), 0, 6);
$_SESSION['code']=$chars;
$color1 = imagecolorallocate($image, 255, 100, 200);
imagefttext($image, 20, 10, 10, 40, $color1, 'font/caiyun.TTF', $chars);
imagepng($image);