<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function generate_barcode_with_text($text) {
    require_once APPPATH . '../vendor/autoload.php';

    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    $barcodeData = $generator->getBarcode($text, $generator::TYPE_CODE_128);
    
    // Create an image with barcode
    $barcodeWidth = 150; // Adjust width as needed
    $barcodeHeight = 25; // Adjust height as needed
    $textHeight = 20; // Height for the text
    $imageHeight = $barcodeHeight + $textHeight;

    // Create a blank image
    $image = imagecreatetruecolor($barcodeWidth, $imageHeight);

    // Allocate colors
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);

    // Fill the image with white
    imagefilledrectangle($image, 0, 0, $barcodeWidth, $imageHeight, $white);

    // Draw the barcode
    $barcodeImage = imagecreatefromstring($barcodeData);
    imagecopy($image, $barcodeImage, 0, 0, 0, 0, $barcodeWidth, $barcodeHeight);

    // Add text below the barcode
    $fontSize = 5; // GD's built-in font size
    $textWidth = imagefontwidth($fontSize) * strlen($text);
    $textX = ($barcodeWidth - $textWidth) / 2;
    $textY = $barcodeHeight + 5; // Spacing between barcode and text

    imagestring($image, $fontSize, $textX, $textY, $text, $black);

    // Output image
    ob_start();
    imagepng($image);
    $imageData = ob_get_contents();
    ob_end_clean();

    imagedestroy($image);
    imagedestroy($barcodeImage);

    return base64_encode($imageData);
}
