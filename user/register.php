<?php
include '../includes/header.php';
include('../includes/dbconnection.php');
$selectqry = "SELECT * FROM categories ";
$result = mysqli_query($con, $selectqry);

?>

<div class="py-10 h-[81vh]">
    <form action="registerqry.php" method="POST" class="w-4/12 bg-gray-200 p-5 mx-auto rounded-lg shadow">
        <h1 class="text-center text-2xl font-bold">Register</h1>
        <input type="text" name="fullname" class="  focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 block w-full p-2 rounded my-5" placeholder="Enter Full Name" required>
        <input type="text" name="email" class="  focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 block w-full p-2 rounded my-5" placeholder="Enter Email" required>
        <input type="password" name="password" class="  focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 block w-full p-2 rounded my-5" placeholder="Enter Password" required>
        <input type="password" name="repassword" class="  focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 block w-full p-2 rounded my-5" placeholder="Re Password" required>
        <select require name="interest" class="block w-full my-5 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            <option selected value="none">Select Interest</option>
            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $data['id'] ?>"><?php echo $data['categoryname'] ?></option>
            <?php } ?>
        </select>

        <div class="text-center">
            <input type="submit" value="Register" class="bg-blue-600 text-white px-4 py-2 rounded-lg cursor-pointer">
            <p class="text-xs mt-2">Already Registered? <a href="login.php" class="text-blue-600">Login Now</a></p>
        </div>
    </form>
</div>

<?php
include '../includes/footer.php';
?>