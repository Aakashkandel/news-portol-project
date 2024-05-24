<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - [bibek news site]</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        h1 {
            text-align: center;
        }

        p {
            margin: 20px;
            line-height: 1.6;
        }
    </style>
</head>
<div>
    <?php
    session_start();

    include('includes/dbconnection.php');
    if (!isset($_SESSION['email'])) {

        include('includes/header.php');
    } else {
       include('user/userheader.php');
    }

    ?>
  
</div>

<body>



    <main class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 bg-purple-600 text-white px-2 py-1 rounded my-2">About Us</h1>
        <p class="text-lg mb-4">Welcome to Online Khabar, your number one source for the latest news around the globe. We're dedicated to providing you the very best of news, with an emphasis on reliability, up-to-date information, and comprehensive coverage.</p>
        <p class="text-lg mb-4">Founded in 2080 by Bibek Ghimire, Online Khabar has come a long way from its beginnings. When Bibek Ghimire first started out, their passion for journalism and providing accurate news drove them to start their own news platform.</p>
        <p class="text-lg mb-4">We hope you enjoy our news coverage as much as we enjoy offering it to you.</p>
        <p class="text-lg">Sincerely,<br>
           <span class="text-green-600 font-semibold"> Bibek Ghimire</span><br>
            <span class="text-orange-600 font-semibold">Founder & CEO, Online Khabar</span></p>
    </main>


    <footer>
        <p>&copy; <?php echo date("Y"); ?> Online Khabar. All rights reserved.</p>
    </footer>
    
   
</body>
<?php include('includes/footer.php') ?>

</html>