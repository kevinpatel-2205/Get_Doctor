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


    <h2>Doctor Registration Form</h2>
    <form action="insertcode.php" method="post" enctype="multipart/form-data">
        <label>Select Image File:</label>
        <input type="file" name="image" required>
        <br>
        <br>
        <!-- <label>Name:</label>
        <input type="text" name="dname" placeholder="Enter your name" required>
        <br>
        <br>
        <label>Password:</label>
        <input type="password" name="dpassword" placeholder="Enter your password" required>
        <br>
        <br>
        <label>Email:</label>
        <input type="email" name="demail" placeholder="Enter your email" required>
        <br>
        <br>
        <label>Gender:</label>
        <select name="dgender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <br>
        <br>
        <label>Contact Number:</label>
        <input type="text" name="dnumber" placeholder="Enter your contact number" required>
        <br>
        <br>
        <label>Address:</label>
        <input type="text" name="daddress" placeholder="Enter your address" required>
        <br>
        <br>
        <label>Specialization ID:</label>
        <input type="text" name="sid" placeholder="Enter your specialization ID" required>
        <br>
        <br>
        <label>Date of Birth:</label>
        <input type="date" name="ddateofbirth" required>
        <br>
        <br>
        <label>Consultation Fee:</label>
        <input type="text" name="dfees" placeholder="Enter your consultation fee" required>
        <br>
        <br>
        <label>Experience (in years):</label>
        <input type="number" name="experienceyears" placeholder="Enter your experience in years" required>
        <br>
        <br>
        <label>Qualification:</label>
        <input type="text" name="dqulification" placeholder="Enter your qualification" required>
        <br>
        <br>
        <label>Active:</label>
        <input type="number" name="dactive" placeholder="Enter 1 for active, 0 for inactive" required>
        <br>
        <br>
        <label>Last Login:</label>
        <input type="date" name="last" placeholder="Enter the last login date and time" required>
        <br>
        <br> -->
        <input type="submit" name="submit" value="Upload">
    </form>