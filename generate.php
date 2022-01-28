<?php
session_start();

//limitamos los chars
$captcha_num = '123456789abcdefghijkmnpqrstuvwxyz';
//genera el string de chars
$captcha_num = substr(str_shuffle($captcha_num), 0, 6);
//declaramos variable global del captcha
$_SESSION["code"] = $captcha_num;


$font_size = 30;
$img_width = 170;
$img_height = 40;

header('Content-type: image/jpeg');

$image = imagecreate($img_width, $img_height); // create background image with dimensions
imagecolorallocate($image, 71, 74, 138); // set background color

$text_color = imagecolorallocate($image, 33, 44, 23); // set captcha text color

imagettftext($image, $font_size, 0, 15, 30, $text_color, 'arial.ttf', $captcha_num);
imagejpeg($image);
?>
