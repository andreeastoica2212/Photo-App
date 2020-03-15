<?php
    session_start();
    if (!isset($_SESSION['username']))
    {
        header('location:login.php');
    }
?>

<html>
<head>
<title> Home Page </title>
    <link rel="stylesheet" type="text/css" href="style2.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        >
</head>

<body>

<div class="topnav">
  <a class="active" href="#home">NewsFeed</a>
  <a href="userupload.php">Upload Poze</a>
  <a href="logout.php">Logout</a>
</div>

<?php
    
$db = mysqli_connect("localhost","root","parola","userregistration"); //keep your db name
    
    $result=$db->query("select * from images");
    $num=mysqli_num_rows($result);
    
    $var = $db->query("SELECT * FROM images");
    $i=0;
    $idcautat = 0;
    while($row = $var->fetch_assoc())
    {
        if ($i===0)
        {
            $idcautat  = $row["id"];}
        $i++;
    }
    
    for ($in=$idcautat; $in<=$num + $idcautat - 1 ; $in++)
    {
        $sql = "SELECT * FROM images WHERE id = $in";
        $sth = $db->query($sql);
        $result=mysqli_fetch_array($sth);
        
        echo '<br><img class="displayed" src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'">';
    }
    
    //nu merge cu id cu 2 nr bag pl
?>

<?php
/*CREATE TABLE `images` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `image` longblob NOT NULL,
 `created` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 
 
 */
?>
    
</html>
