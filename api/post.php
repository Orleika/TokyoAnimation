<?php
$file = $_FILES['upload_file'];
$tmp_name = $file['tmp_name'];
$tmp_size = getimagesize($tmp_name);

$img = $extension = null;
switch ($tmp_size[2]) {
  case 1 : // GIF
    $img = imageCreateFromGIF($tmp_name);
    $extension = 'gif';
    break;
  case 2 : // JPEG
    $img = imageCreateFromJPEG($tmp_name);
    $extension = 'jpg';
    break;
  case 3 : // PNG
    $img = imageCreateFromPNG($tmp_name);
    $extension = 'png';
    break;
  default :
    break;
}

$targ_w = $targ_h = 150;
$jpeg_quality = 90;
$img_name = $_FILES["img_path"]["name"];
$img_size = $_FILES["img_path"]["size"];
$img_type = $_FILES["img_path"]["type"];
$img_tmp = $_FILES["img_path"]["tmp_name"];
if($_REQUEST["up"] != ""){
if($img_tmp != "" and $img_size <= 30000){
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor($targ_w, $targ_h);
imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x'], $_POST['y'], $targ_w, $targ_h, $_POST['w'], $_POST['h']);
header('Content-type: image/jpeg');
imagejpeg($dst_r, null, $jpeg_quality);

// post
