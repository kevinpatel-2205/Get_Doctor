<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "db_get_doctor";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>


    <h2>patient Registration Form</h2>
    <form action="insertcode.php" method="post" enctype="multipart/form-data">
        <label>Select Image File:</label>
        <input type="file" name="image" required>
        <br>
        <br>
        <label>Name:</label>
        <input type="text" name="pname" placeholder="Enter your name" required>
        <br>
        <br>
        <label>Password:</label>
        <input type="password" name="ppassword" placeholder="Enter your password" required>
        <br>
        <br>
        <label>Email:</label>
        <input type="email" name="pemail" placeholder="Enter your email" required>
        <br>
        <br>
        <label>Gender:</label>
        <select name="pgender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <br>
        <br>
        <label>Contact Number:</label>
        <input type="text" name="pnumber" placeholder="Enter your contact number" required>
        <br>
        <br>
        <label>Address:</label>
        <input type="text" name="paddress" placeholder="Enter your address" required>
        <br>
        <br>
        <label>BLOOD_GROUP:</label>
        <input type="text" name="pblood_group" placeholder="Enter your BLOOD_GROUP" required>
        <br>
        <br>
        <label>Date of Birth:</label>
        <input type="date" name="pdateofbirth" required>
        <br>
        <br>
        <input type="submit" name="submit" value="Upload">
    </form>