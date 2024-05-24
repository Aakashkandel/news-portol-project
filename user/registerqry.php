<?php
include '../includes/dbconnection.php';
if(isset($_POST['fullname']))
{
    $fullname = $_POST['fullname'];
    $interest=$_POST['interest'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if($fullname == "" || $email == "" || $password == "" || $repassword == ""  )
    {
        echo '<script>alert("Please fill all the fields"); history.back();</script>';
    }

    if($password != $repassword)
    {
        echo '<script>alert("Password and Repassword didnot match"); history.back();</script>';
    }
    $password = md5($password);
    $qry = "INSERT INTO viewer (fullname, email, password,interest) VALUES ('$fullname', '$email', '$password','$interest')";

   


    
    if(mysqli_query($con, $qry))
    {
        echo '<script>alert("User Registered Successfully"); window.location="userlogin.php";</script>';
    }
    else
    {
        echo '<script>alert("Something went wrong"); history.back();</script>';
    }

    include '../includes/closeconnection.php';
}
?>