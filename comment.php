<?php
session_start();

// Check if the user is logged in, if required
// if (!isset($_SESSION['email'])) {
//     die("You must be logged in to leave a comment.");
// }

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "newsapp";



$newsid = $_GET['cid'];
$userid=$_GET['userid'];
$comment = $_POST["comment"];

// Connect to the database
$connection = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // Escape user inputs to prevent SQL injection
    $cid = mysqli_real_escape_string($connection, $cid);
    $comment = mysqli_real_escape_string($connection, $comment);

    // Insert the comment into the database
    $query = "INSERT INTO comments (cid, description,newsid) VALUES ('$userid', '$comment','$newsid')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Feedback sent successfully";
        header("Location: /news/view.php?newsid=$newsid");
        exit();
    } else {
        echo "Unable to send feedback";
    }

    mysqli_close($connection);
}
?>