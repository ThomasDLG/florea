<?php
require("../../vendor/autoload.php");
use Intervention\Image\ImageManagerStatic as Image;

$img = Image::make('../img/photos/' . $_GET['file']);

// resize image instance
$img->fit(1920, 530);

echo $img->response();