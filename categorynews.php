<?php
session_start();

include('includes/dbconnection.php');
if(!isset($_SESSION['email']))
{

    include('includes/header.php');
    
}
else{
    include('user/userheader.php'); 
}

?>
   


<?php 
$catid = $_GET['catid'];
$qrycat = "SELECT * FROM categories WHERE id=$catid";
$qry = "SELECT * FROM news WHERE category_id=$catid ORDER BY news_date desc";
include 'includes/dbconnection.php';
$catresult = mysqli_query($con,$qrycat);
$category = mysqli_fetch_assoc($catresult);
$newsresult = mysqli_query($con,$qry);
include 'includes/closeconnection.php';
?>

<div class="py-10">
    <h2 class="text-3xl font-bold text-center"><?php echo $category['categoryname'] ?> News</h2>

    <div class="grid grid-cols-4 gap-10 px-24 my-5">
        <?php 
        while($news = mysqli_fetch_assoc($newsresult))
        
        { ?>
        
        <a href="view.php?newsid=<?php echo $news['id'] ?>">
        <div class="bg-gray-300 rounded-lg">
            <img src="admin/uploads/<?php echo $news['photopath'];?>" alt="" class="rounded-t-lg h-60 object-cover">
            <div class="p-2">
            <div class=" h-16"> <h1 class="font-bold text-lg flowdiv"><?php echo $news['title'];?></h1></div>
                <p class="text-gray-600 text-justify line-clamp-3"><?php echo $news['description'];?></p>
                <div class="text-sm text-gray-100 px-2 font-bold bg-purple-600 my-2 rounded ">
                <i class="ri-calendar-line"></i> <?php echo $news['news_date']; ?>
                </div>
            </div>
        </div>
        </a>
        <?php } ?>
    </div>
    
</div>


<?php include('includes/footer.php') ?>