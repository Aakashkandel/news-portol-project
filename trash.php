<?php
$server = 'localhost';
$username = 'root';
$pass = '';
$database = 'newsapp';

$con = mysqli_connect($server,$username,$pass,$database);

if(!$con)
{
    die('Connection Cannot Establish');
}
    $fullname="bibek admin";
    $username="bibek.news@gmail.com";
    $password="111111";
    $password = md5($password);
    $qry = "INSERT INTO users (fullname, username, password) VALUES ('$fullname', '$username', '$password')";
   

    
    
    if(mysqli_query($con, $qry))
    {
        echo "register successfully";
    }
    else
    {
        echo"unable to register";
    }

   

?>