<?php
session_start();

// Generate random 4-digit code
$code = rand(1000, 9999);
$_SESSION['captcha_code'] = $code;

// Create image
header('Content-type: image/png');
$image = imagecreate(70, 30);
$bg = imagecolorallocate($image, 220, 220, 220);
$text = imagecolorallocate($image, 0, 0, 0);

// Add random lines for noise
for ($i = 0; $i < 5; $i++) {
    imageline($image, 0, rand(0,30), 70, rand(0,30), $text);
}

// Add the text
imagestring($image, 5, 10, 8, $code, $text);

// Output image
imagepng($image);
imagedestroy($image);
?>
