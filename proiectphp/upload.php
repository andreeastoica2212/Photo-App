<?php

error_reporting(E_ALL ^ E_WARNING); 
if(isset($_POST["submit"]))
{
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check != false)
    {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        /*
         * Insert image data into database
         */
        
        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = 'parola';
        $dbName     = 'userregistration';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error)
        {
            die("Connection failed: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', '$dataTime')");
        if($insert)
        {
            include 'userupload.php';
            echo "<script>alert('File uploaded successfully.')</script>";
        }
        else
        {
            include 'userupload.php';
            echo "<script>alert('File upload failed, please try again.')</script>";
        }
    }
    else
    {
        include 'userupload.php';
        echo "<script>alert('Please select an image file to upload.')</script>";
    }
}
?>
