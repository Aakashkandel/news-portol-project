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

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold mb-6">Contact Us</h2>
            <form id="contactForm" action="contactqry.php" method="POST" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" id="message" required class="mt-1 p-2 border border-gray-300 rounded-md w-full" rows="4"></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full bg-gray-500 text-white p-2 rounded-md hover:bg-blue-600">Send Message</button>
                </div>
            </form>
        </div>
    </div>
    <?php include('includes/footer.php') ?>
</body>
</html>
