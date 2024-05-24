<?php
session_start();

include 'includes/dbconnection.php';
if (!isset($_SESSION['email'])) {
    $isLoggedin = true;
    

    header("location:user/userlogin.php");
}

?>




<?php

$useriddqry = "SELECT * FROM viewer WHERE email='" . $_SESSION['email'] . "'";
    $idresult = mysqli_query($con, $useriddqry);
    if ($dataid = mysqli_fetch_assoc($idresult)) {
        $uname = $dataid['fullname'];
    }
include('user/userheader.php');


include 'includes/dbconnection.php';

$subquery = "SELECT interest FROM viewer WHERE email = '$_SESSION[email]'";
$result3 = mysqli_query($con, $subquery);
while ($data3 = mysqli_fetch_assoc($result3)) {
    $catid = ($data3['interest']);
}




$subquery1 = "SELECT * FROM categories WHERE id = $catid";
$result4 = mysqli_query($con, $subquery1);
$data4 = mysqli_fetch_assoc($result4);





$qry4 = "SELECT * FROM news WHERE category_id = $catid ORDER BY news_date DESC";




$newsresult = mysqli_query($con, $qry4);
include 'includes/closeconnection.php';
?>
<div class=" flex justify-end  "><span class="text-green-600 font-semibold">Welcome! </span class="text-bold"><span><?php echo " ". $uname ?></span></div>
<div class="py-10">
    
    <h2 class="text-3xl font-bold text-center">Latest News About <?php echo ($data4['categoryname']) ?> </h2>

    <div class="grid grid-cols-4 gap-10 px-24 my-5 ">
        <?php
        while ($news = mysqli_fetch_assoc($newsresult)) { ?>
            <a id="select" href="counter.php?newsid=<?php echo $news['id'] ?>">
                <div class="bg-gray-300 rounded-lg border-2 h-full">
                    <img src="admin/uploads/<?php echo $news['photopath']; ?>" alt="" class="rounded-t-lg h-60 object-cover">
                    <div class="p-2 ">
                        <div class=" h-16">
                            <h1 class="font-bold text-lg flowdiv"><?php echo $news['title']; ?></h1>
                        </div>
                        <p class="text-gray-600 text-justify line-clamp-1 h-20 overflow-hidden"><?php echo $news['description']; ?></p>
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