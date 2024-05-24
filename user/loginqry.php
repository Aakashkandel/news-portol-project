<?php
session_start();
if(isset($_POST['username']))
{
    $email = $_POST['username'];
    $password = $_POST['password'];

    if($email == "" || $password == "")
    {
        echo '<script>alert("Please fill all the fields"); history.back();</script>';
    }

    $qry = "SELECT * FROM viewer WHERE email='$email' AND password=md5('$password')";
    include '../includes/dbconnection.php';
    $result = mysqli_query($con, $qry);
    include '../includes/closeconnection.php';

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['email'] = $row['email'];
        header("location:../userindex.php");
      
    }
    else
    {
        echo '<script>alert("Invalid Username or Password"); history.back();</script>';
    }
    
}