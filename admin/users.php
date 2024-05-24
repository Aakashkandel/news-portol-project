<?php 
include('../includes/dbconnection.php'); // Adjusted path to the parent directory
include('header.php'); 
?>


<body>

<h1 class="text-3xl font-bold">Users</h1>
<hr class="h-1 bg-red-600">

<div class="mt-5">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <!-- <th style="border: 1px solid black; padding: 10px; background-color: #f2f2f2; text-align: left;">ID</th> -->
                <th style="border: 1px solid black; padding: 10px; background-color: #f2f2f2; text-align: left;">Username</th>
                <th style="border: 1px solid black; padding: 10px; background-color: #f2f2f2; text-align: left;">Email</th>
                <!-- <th style="border: 1px solid black; padding: 10px; background-color: #f2f2f2; text-align: left;">Created At</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Query to fetch users data
            $qry = "SELECT fullname, email FROM viewer";
            $result = mysqli_query($con, $qry);
            
            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    // echo "<td style='border: 1px solid black; padding: 10px;'>" . $row['id'] . "</td>";
                    echo "<td style='border: 1px solid black; padding: 10px;'>" . $row['fullname'] . "</td>";
                    echo "<td style='border: 1px solid black; padding: 10px;'>" . $row['email'] . "</td>";
                    // echo "<td style='border: 1px solid black; padding: 10px;'>" . $row['created_at'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='border: 1px solid black; padding: 10px; text-align: center;'>No users found</td></tr>";
            }

            // Free result set
            mysqli_free_result($result);

            // Close connection
            include('../includes/closeconnection.php'); // Adjusted path to the parent directory
            ?>
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>
</body>
</html>
