<?php
/////////////////////////////////////////////////////
/////   Random Captcha                      ////////
/////   Script By:-                         ////////
////    Vipin Khushu (vipinkhushu@hotmail.com)//////
////    http://www.github.com/vipinkhushu  /////////
////////////////////////////////////////////////////


// Set the content-type so that php script returns an image and not a webpage
header('Content-Type: image/png');

// Create the image
$image = imagecreate(200, 80);

// Create some colors
$white = imagecolorallocate($image, 255, 255, 255);
$grey = imagecolorallocate($image, 128, 128, 128);
$black = imagecolorallocate($image, 0, 0, 0);

// Random text to draw
$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$text = '';
for ($i = 0; $i < 5; $i++)
	$text .= $characters[mt_rand(0, 35)];

// Storing Text In Session For Verification Purposes
session_start();
$_SESSION["captchaText"]=$text;

// Our font path
$font = 'chrismas.ttf';


// Add the random text to image
imagettftext($image, 25, 10, 25, 50, $black, $font, $text);

//Add random lines to the image
for ($i = 1; $i <= 5; $i++){
	imageline( $image, mt_rand(10, 190), mt_rand(10, 70), mt_rand(10, 190), mt_rand(10, 70), $grey );
}

//Generate Image
//Using imagepng() results in clearer text compared with imagejpeg()
imagepng($image);
imagedestroy($image);
?>