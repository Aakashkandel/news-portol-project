<?php 
include 'includes/dbconnection.php';
$newsid = $_GET['newsid'];
$qry = "SELECT * FROM news WHERE id = $newsid";
$result = mysqli_query($con, $qry);

if ($result) {
   
    $news = mysqli_fetch_assoc($result);
    
    $count = $news['count'];
    
    $counter = $count + 1;
    $updateqry = "UPDATE news SET count = $counter WHERE id = $newsid";
    $result2 = mysqli_query($con, $updateqry);

    if ($result2) {
    
        header("location: view.php?newsid= $newsid");
        exit; 
    } else {
        echo "Error updating priority: " . mysqli_error($con);
    }
} else {
    echo "Error selecting news: " . mysqli_error($connection);
}

include 'includes/closeconnection.php';
?>
