<?php
session_start();


include('includes/dbconnection.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $to = "aakashkandel9777@gmail.com";
    $subject = "New Contact Message";
    $headers = "From: $email";

    $body = "You have received a new message from a viewer.\n\n";
    $body .= "Name: " . $name . "\n";
    $body .= "Email: " . $email . "\n";
    $body .= "Subject: " . $subject . "\n\n";
    $body .= "Message:\n" . $message . "\n";
    $headers = "From: noreply@onlinekhabar.com\r\n"; 

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('message has been sent successfully');</script>";
        echo "<script>window.location.href = 'contactus.php';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error sending your message');</script>";
        echo "<script>window.location.href = 'contactus.php';</script>";
    }



    mysqli_close($con);
} else {
    echo "<alert>Please fill details properly</alert>";
    header("Location: contact.php");

    exit();
}
