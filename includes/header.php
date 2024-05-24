
<html>

<head>
    <title>newsportol-onlinekhabar</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"/>
   
    <style>
        .ho{
            transition: .25s;
        }
        .ho:hover{
            transform: scale(1.2);
            transition: .1s;
        }
    </style>
</head>

<body>
    <nav class="flex justify-between items-center shadow px-14">
        <img src="/news/includes/logo.JPG" class="h-20  rounded-2xl" alt="">
        <div>
            <a class="ho mx-2  <?php if (strpos($_SERVER['REQUEST_URI'], 'index') !== false) {
                        echo 'font-bold'; }?>" href="/news/index.php">Home</a>
            <a class=" ho mx-2 <?php if (strpos($_SERVER['REQUEST_URI'], 'about') !== false) {
                        echo 'font-bold'; }?>" href="/news/about.php">About Us</a>
                        <a class="mx-2  <?php if (strpos($_SERVER['REQUEST_URI'], 'contactus') !== false) {
                        echo 'font-bold'; }?>" href="/news/contactus.php">Contact Us</a>
           <a class=" ho mx-2  <?php if (strpos($_SERVER['REQUEST_URI'], 'nab') !== false) {
                        echo 'font-bold'; }?>" href="/news/nab.php">News</a>
            <a class=" ho mx-2 bg-green-600 text-gray-100 px-2 py-1 rounded <?php if (strpos($_SERVER['REQUEST_URI'], 'login.php') !== false) {
                        echo 'font-bold'; }?>" href="/news/user/userlogin.php">Login</a>
            <a class=" ho mx-2 bg-orange-600 text-gray-100 px-2 py-1 rounded  <?php if (strpos($_SERVER['REQUEST_URI'], 'user') !== false) {
                        echo 'font-bold'; }?>" href="/news/user/register.php">Register</a>
        </div>
        </div>
    </nav>
