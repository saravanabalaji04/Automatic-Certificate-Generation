<?php
    include 'im.php';
    //Save or display the modified image
    header('Content-Type: image/jpeg'); // Set the appropriate header for the image format
    //imagejpeg($image);
    $directory='C:\xampp\htdocs\Certi\images\\';
    $outputImagePath = $directory.$text.'.jpg'; // Replace with the desired output file path
    //imagejpeg($image);
    imagejpeg($image, $outputImagePath,90);
    require_once "fpdf186/fpdf.php";
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->Image($outputImagePath,25,80,170);
    $pdf->Output();
    //echo 'Image saved successfully as: ' . $outputImagePath;
    // Clean up
    imagedestroy($image);
?>