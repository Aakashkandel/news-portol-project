<?php
session_start();
if(!isset($_SESSION['fullname']))
{
    echo '<script>window.location="../admin/login.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex">
        <div class="w-56 rounded-lg">
            <img src="../admin/logo.JPG" class="h-20 mx-5 my-5 rounded-2xl" alt="">

            <div class="mt-5">
                <p>Hello, <?php echo $_SESSION['username']; ?></p>
                <!-- <a href="dashboard.php" class="text-lg block p-2 my-2 hover:bg-gray-300 hover:text-right hover:mx-2"><p
                    class="  <?php if (strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false) {
                        echo 'w-72 pl-3 h-14  text-white  bg-gray-800    py-3  font-3xl pr-3  rounded-xl ';
                    } ?> w-72 pl-3 h-14 text-center hover:text-white  border-b-indigo-500  hover:text-right hover:text-gray-900 whitespace-nowrap  hover:py-3  hover:font-3xl hover:pr-3 hover:text-right rounded-xl">
                    Dashboard</p></a> -->
                <a href="dashboard.php" class="text-lg block p-2 my-2 hover:bg-gray-300 hover:text-right hover:mx-2  <?php if (strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false) {
                        echo ' pl-3 h-14  text-white  bg-gray-800    py-3  font-3xl pr-3  rounded-xl '; }?>">Dashboard</a>
                <a href="users.php" class="text-lg block p-2 my-2 hover:bg-gray-300 hover:text-right hover:mx-2  <?php if (strpos($_SERVER['REQUEST_URI'], 'users') !== false) {
                        echo ' pl-3 h-14  text-white  bg-gray-800    py-3  font-3xl pr-3  rounded-xl '; }?>">Users</a>
                <a href="category.php" class="text-lg block p-2 my-2 hover:bg-gray-300 hover:text-right hover:mx-2  <?php if (strpos($_SERVER['REQUEST_URI'], 'category') !== false) {
                        echo ' pl-3 h-14  text-white  bg-gray-800    py-3  font-3xl pr-3  rounded-xl '; }?>">Category</a>
                <a href="news.php" class="text-lg block p-2 my-2 hover:bg-gray-300 hover:text-right hover:mx-2  <?php if (strpos($_SERVER['REQUEST_URI'], 'news.php') == true) {
                        echo ' pl-3 h-14  text-white  bg-gray-800    py-3  font-3xl pr-3  rounded-xl '; }?>">News</a>
                <a href="logout.php" class="text-lg block p-2 my-2 hover:bg-gray-300 hover:text-right hover:mx-2  <?php if (strpos($_SERVER['REQUEST_URI'], 'logout') !== false) {
                        echo ' pl-3 h-14  text-white  bg-gray-800    py-3  font-3xl pr-3  rounded-xl '; }?>">Logout</a>
            </div>
        </div>
        <div class="p-4 flex-1">