<?php
session_start();

include('includes/dbconnection.php');
include 'includes/header.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .flowdiv
        {
            overflow:hidden;
        }
    </style>
</head>

<body>
  
<?php 



include 'includes/dbconnection.php';
$subquery = "SELECT MAX(news_date) AS max_date FROM news";
$qry = "SELECT * FROM news WHERE news_date = ($subquery) ORDER BY count DESC";
$newsresult = mysqli_query($con,$qry);
include 'includes/closeconnection.php';
?>
<div class="py-10 ">
    <h2 class="text-3xl font-bold text-center">Latest News</h2>

    <div class="grid grid-cols-4 gap-10 px-16 my-5 ">
        <?php 
        while($news = mysqli_fetch_assoc($newsresult))
        { ?>
        <a id="select" href="counter.php?newsid=<?php echo $news['id']?>">
        <div class="bg-gray-300 rounded-lg border-2 h-full">
            <img src="admin/uploads/<?php echo $news['photopath'];?>" alt="" class="rounded-t-lg h-60 object-cover">
            <div class="p-2 ">
               <div class=" h-16"> <h1 class="font-bold text-lg flowdiv"><?php echo $news['title'];?></h1></div>
                <p class="text-gray-600  text-justify line-clamp-1 h-20 overflow-hidden"><?php echo $news['description'];?></p>
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


