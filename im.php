<?php
include 'connect.php';
if (isset($_POST["submit"])) 
{
    $email=$_POST["email"];
    $sql = " SELECT fname FROM user where Email='$email' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $conn->close();

    // Load the image
    $imagePath = 'C:\xampp\htdocs\Certi\images\templates\certificate.jpeg';
    $image = imagecreatefromjpeg($imagePath);

    // Set the text color
    $textColor = imagecolorallocate($image, 255, 0, 0); // RGB values for white
    $textColor1 = imagecolorallocate($image, 178, 102, 255); //RGB for purple
    $textColor2 = imagecolorallocate($image, 178, 102, 255);
    // Set the font path
    $fontPath = 'C:\xampp\htdocs\Certi\fonts\Oxford Font\Oxford-LAqy.ttf'; // Replace with the path to your desired font file

    // Set the text to be added
    $text =$row["fname"];
    // Set the font size
    $fontSize = 40;
    if(strlen($text)>=12)
    {
        // Set the coordinates for the text
        $x = 225; // X-coordinate of the starting point
        $y = 285; // Y-coordinate of the starting point
    }
    elseif(strlen($text)<12 && strlen($text)>=8)
    {
        $x=280;
        $y=285;
    }
    elseif(strlen($text)<8 && strlen($text)>=3)
    {
        $x=305;
        $y=285;
    }
    // Add the text to the image
    imagettftext($image, $fontSize, 0, $x, $y, $textColor, $fontPath, $text);
    imagettftext($image, $fontSize, 0, '175', '420', $textColor1, $fontPath, "KCET");
    imagettftext($image, $fontSize, 0, '410', '420', $textColor2, $fontPath, "09/10/23");
    // Remove command line for the next two line to check the allignment
    // header('Content-Type: image/jpg');
    // imagejpeg($image);
}

$conn->close();
?>
