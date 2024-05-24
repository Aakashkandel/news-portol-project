<?php
session_start();
//create database connection
$server = 'localhost';
$username = 'root';
$pass = '';
$database = 'newsapp';

$con = mysqli_connect($server,$username,$pass,$database);

if(!$con)
{
    die('Connection Cannot Establish');
}

if(isset($_POST['username']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "" || $password == "")
    {
        echo '<script>alert("Please fill all the fields"); history.back();</script>';
    }

    $qry = "SELECT * FROM users WHERE username='$username' AND password=md5('$password')";
  
    $result = mysqli_query($con, $qry);
   

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['username'] = $username;

     
    
        // echo '<script>window.location="../admin/dashboard.php";</script>';
      header("location:dashboard.php");
        echo "i am here";
    }
    else
    {
        echo '<script>alert("Invalid Username or Password"); history.back();</script>';
    }
    
}
?>