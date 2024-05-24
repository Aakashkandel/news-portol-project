<?php
session_start();

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "newsapp";

$commentid = $_GET['commentid'];
$newsid = $_GET['newsid'];

// Connect to the database
$connection = mysqli_connect($server_name, $db_username, $db_password, $db_name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $query = "DELETE FROM comments WHERE comment_id=$commentid";

    $result = mysqli_query($connection, $query);

    // Check if the query was successful
    if ($result) {
        // Check if any rows were affected
        if (mysqli_affected_rows($connection) > 0) {
            echo "Comment deleted successfully";
        } else {
            echo "No comment found with ID $commentid";
        }
        // Redirect to the news view page
        header("Location: /news/view.php?catid=$newsid");
        exit();
    } else {
        echo "Unable to delete comment: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>
