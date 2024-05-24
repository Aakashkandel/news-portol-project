<?php
session_start();

include('includes/dbconnection.php');
if (isset($_SESSION['email'])) {
    $isLoggedin = true;
    $useriddqry = "SELECT * FROM viewer WHERE email='" . $_SESSION['email'] . "'";
    $idresult = mysqli_query($con, $useriddqry);
    if ($dataid = mysqli_fetch_assoc($idresult)) {
        $userid = $dataid['id'];
    }

    $header = include('user/userheader.php');
} else {
    $isLoggedin = false;
    include('includes/header.php');
}




$newsid = $_GET['newsid'];
$qry = "SELECT * FROM news WHERE id=$newsid";

include 'includes/dbconnection.php';

$newsresult = mysqli_query($con, $qry);

?>

<div class="py-10 w-full grid place-items-center text-center border-2">
    <div class="w-3/4">
        <?php while ($news = mysqli_fetch_assoc($newsresult)) { ?>
            <div class="bg-gray-300 rounded-lg grid place-items-center">
                <img src="admin/uploads/<?php echo $news['photopath']; ?>" alt="" class="rounded-t-lg h-60 object-cover">
                <div class="p-2">
                    <h1 class="font-bold text-lg"><?php echo $news['title']; ?></h1>
                    <p class="text-gray-600 text-justify line-clamp-3"><?php echo $news['description']; ?></p>
                    <div class="flex justify-between">
                        <div class="text-sm text-gray-100 px-2 font-bold bg-purple-600 my-2 rounded ">
                            <i class="ri-calendar-line"></i> <?php echo $news['news_date']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <form id="formid" class="bg-gray-300 p-1 rounded-xl my-2 flex justify-start" action="comment.php?cid=<?php echo $news['id']; ?>& userid=<?php echo $userid ?> " method="POST">
                <div class="rounded-2xl w-1/2 p-1">
                    <textarea name="comment" class=" px-2 py-1ehh focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 w-full rounded" placeholder="Comment here"></textarea>
                </div>
                <div class="flex justify-center items-center">
                    <button id="submitId" onclick="<?php echo $isLoggedin ? 'submitter()' : 'redirect()'; ?>" class="bg-green-600 text-white font-bold rounded-xl px-2 py-1 hover:bg-green-400" type="button">Submit</button>
                </div>
            </form>

        <?php } ?>
    </div>

</div>

<div class="text-xl font-bold text-gray-700">Comments</div>
<?php
if ($isLoggedin == true) {
    $commentqry = "SELECT  DISTINCT * FROM comments c JOIN viewer v ON c.cid = v.id WHERE c.newsid = $newsid AND c.cid = $userid ORDER BY c.comment_id DESC";
    $commentresult = mysqli_query($con, $commentqry);

    while ($commentdata = mysqli_fetch_assoc($commentresult)) {
?>
        <div class="bg-gray-300 mx-2 my-4 rounded-xl p-2 ">
            <div class="flex items-center">
                <div class="w-8 ml-4"><img src="image/userlogo.png" alt=""></div>
                <div class="mx-4 text-purple-700 font-bold "><?php echo htmlspecialchars($commentdata['fullname']); ?></div>
            </div>
            <div class="flex">
                <div class="w-9/12 m-auto"><?php echo htmlspecialchars($commentdata['description']); ?></div>
                <div>
                    <?php
                    if ($isLoggedin == true) {
                        echo "<a class=\"bg-red-600 font-semibold text-gray-100 px-2 py-1 rounded\" href=\"/news/viewdeleteqry.php?newsid=" . $commentdata['newsid'] . "&commentid=" . $commentdata['comment_id'] . "\">Delete</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        $commentqry = "SELECT * FROM comments c JOIN viewer v ON c.cid = v.id where c.newsid=$newsid AND c.cid!=$userid   ORDER BY c.comment_id DESC"; // Assuming the join should be on c.viewer_id
        $commentresult = mysqli_query($con, $commentqry);


        while ($commentdata = mysqli_fetch_assoc($commentresult)) {
        ?>

            <div class="bg-gray-300 mx-2 my-4 rounded-xl p-2 ">
                <div class="flex  items-center">
                    <div class="w-8 ml-4"><img src="image/userlogo.png" alt=""></div>
                    <div class="mx-4 text-purple-700 font-bold "><?php echo $commentdata['fullname'] ?></div>
                </div>
                <div class="flex ">
                    <div class="w-9/12  m-auto "><?php echo $commentdata['description'] ?></div>

                    <div>

                        <div>

                        </div>

                    </div>


                </div>
            </div>
        <?php } ?>
<?php
    }
} else {
    echo "You must be logged for comments.";
    ?>

<?php
$commentqry = "SELECT * FROM comments c JOIN viewer v ON c.cid = v.id where c.newsid=$newsid    ORDER BY c.comment_id DESC"; // Assuming the join should be on c.viewer_id
$commentresult = mysqli_query($con, $commentqry);


while ($commentdata = mysqli_fetch_assoc($commentresult)) {
?>

    <div class="bg-gray-300 mx-2 my-4 rounded-xl p-2 ">
        <div class="flex  items-center">
            <div class="w-8 ml-4"><img src="image/userlogo.png" alt=""></div>
            <div class="mx-4 text-purple-700 font-bold "><?php echo $commentdata['fullname'] ?></div>
        </div>
        <div class="flex ">
            <div class="w-9/12  m-auto "><?php echo $commentdata['description'] ?></div>

            <div>

                <div>

                </div>

            </div>


        </div>
    </div>
<?php } ?>


<?php
}
?>








<script>
    function submitter() {

        console.log('Form submitted');
        document.getElementById('formid').submit();
    }

    function redirect() {
        alert('Please login first');
        window.location.href = '/news/user/userlogin.php';
    }
</script>

<?php include('includes/footer.php'); ?>