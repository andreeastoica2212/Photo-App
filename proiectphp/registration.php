<?php
    //session_start();
    //header('location:login.php');
    
    $con=mysqli_connect('localhost','root','parola');
    mysqli_select_db($con,'userregistration');
    
    $name=$_POST['user'];
    $pass=$_POST['password'];
    
    $s="select * from usertable where name='$name'";
    $result=mysqli_query($con,$s);
    $num=mysqli_num_rows($result);
    
    if ($num == 1)
    {
        include 'login.php';
        echo "<script>alert('Username already taken.')</script>";
    }
    else
    {
        $reg="insert into usertable (name,password) values ('$name','$pass')";
        mysqli_query($con,$reg);
        include 'login.php';
        echo "<script>alert('Registration successful.')</script>";
    }
?>
