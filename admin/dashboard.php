<?php 
include('header.php'); 
include '../includes/dbconnection.php';

$qry1 = "SELECT COUNT(*) as newscount FROM news";
$resultcat1 = mysqli_query($con, $qry1);
$row1 = mysqli_fetch_assoc($resultcat1);
$total_news = $row1['newscount'];

$qry2 = "SELECT COUNT(*) as admincount FROM users";
$resultcat2 = mysqli_query($con, $qry2);
$row2 = mysqli_fetch_assoc($resultcat2);
$total_user = $row2['admincount'];

// Query to count the number of categories
$qry = "SELECT COUNT(*) as category_count FROM categories";
$resultcat = mysqli_query($con, $qry);
$row = mysqli_fetch_assoc($resultcat);
$total_categories = $row['category_count'];

include '../includes/closeconnection.php';
?>

<h1 class="text-3xl font-bold">Dashboard</h1>
<hr class="h-1 bg-red-600">

<div class="mt-5 grid grid-cols-3 gap-10">
    

  

    <div class="p-4 bg-red-600 text-white rounded-md flex justify-between shadow">
        <h1 class="text-lg">Total Categories</h1>
        <h1 class="text-3xl"><?php echo $total_categories; ?></h1>
        
    </div>

    <div class="p-4 bg-green-600 text-white rounded-md flex justify-between shadow">
        <h1 class="text-lg">User</h1>
        <h1 class="text-3xl"><?php echo $total_user; ?></h1>
    </div>

    <div class="p-4 bg-green-600 text-white rounded-md flex justify-between shadow">
        <h1 class="text-lg">News</h1>
        <h1 class="text-3xl"><?php echo $total_news; ?></h1>
    </div>
</div>

<?php include('footer.php'); ?>
