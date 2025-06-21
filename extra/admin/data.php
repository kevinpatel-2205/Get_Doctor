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

<form action="insertcode.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="text" name="aname">
    <input type="text" name="apassword">
    <input type="text" name="aemail">
    <input type="date" name="ALAST_PASSWORD_CHANGE">
    <input type="text" name="anumber">
    <input type="text" name="address">
    <br>
    <input type="submit" name="submit" value="Upload">
</form>