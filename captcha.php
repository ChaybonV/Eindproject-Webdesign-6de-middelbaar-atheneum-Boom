<?php
session_start();

$random = rand(100, 999); 
$_SESSION['cijfers'] = $random;
$captcha = imagecreatetruecolor(200, 50); 
$achtergrondkleur = imagecolorallocate($captcha, 204, 204, 204);
imagefilledrectangle($captcha, 0, 0, 200, 50, $achtergrondkleur);
$breedte = imagesx($captcha);
$hoogte = imagesy($captcha);
$x = rand(10, $breedte - 50); 
$y = rand(10, $hoogte - 20);
$tekstkleur = imagecolorallocate($captcha, 0, 0, 0);
imagestring($captcha, 5, $x, $y, $random, $tekstkleur);
imagefilter($captcha, IMG_FILTER_GAUSSIAN_BLUR);
header('Content-type: image/png');
imagepng($captcha);
imagedestroy($captcha);
?>