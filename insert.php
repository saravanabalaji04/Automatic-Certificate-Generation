<?php
    include 'connect.php';

    if (isset($_POST["submit"])) 
    {
        $name=$_POST["name"];
        $email = $_POST["email"];
        $college = $_POST["college"];
        $year = $_POST["year"];
        $sql="INSERT INTO `User`( `fname`,`Email`,`College`,`Year`) VALUES ('$name','$email','$college','$year')";
		$result = mysqli_query($conn, $sql);
        if($result) 
        {
            echo "<script>alert('Wow! User Registration Completed.')</script>";
        }
        else 
        {
            echo("<script>alert('Something Went Wrong...')</script>");
        }
    }

?>