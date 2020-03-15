<?php
    session_start();
    
?>

<html>
<head>
<title> Home Page </title>
    <link rel="stylesheet" type="text/css" href="style3.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        >
</head>

<body>

    <div class="topnav">
      <a href="home.php">NewsFeed</a>
      <a class="active" href="userupload.php">Upload Poze</a>
      <a href="logout.php">Logout</a>
    </div>

    <div class="box">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="image" />
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</body>

</html>
