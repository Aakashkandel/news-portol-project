<?php 
include 'includes/dbconnection.php';
$qry = "SELECT * FROM categories ORDER BY priority";
$resultcat = mysqli_query($con, $qry);
include 'includes/closeconnection.php';

?>
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
   
<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
</head>
<body>
    <nav style="
        display: flex;
        flex-direction: column;
      
    
        gap: 10px;
        " class="h-[81vh]">
        <?php while ($cat = mysqli_fetch_assoc($resultcat)) { ?>
            <a href="categorynews.php?catid=<?php echo $cat['id']; ?>" class="bg-gray-200 font-bold mx-2 rounded my-2 h-10 text-center  text-gray-600 hover:bg-green-600 hover:text-gray-100 " >
                <?php echo $cat['categoryname']; ?>
            </a>
        <?php } ?>
    </nav>
    <?php include('includes/footer.php') ?>
</body>
</html>
