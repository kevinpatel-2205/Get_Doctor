<?php
// Database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "db_get_doctor";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $pname = $_POST['pname'];
    $ppassword = $_POST['ppassword'];
    $pemail = $_POST['pemail'];
    $pgender = $_POST['pgender'];
    $pnumber = $_POST['pnumber'];
    $paddress = $_POST['paddress'];
    $pbloodgroup=$_POST['pblood_group'];
    $pdateofbirth = $_POST['pdateofbirth'];


    // Check if file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        // File upload path
        $targetDir = "pimage/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Get the file type
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $insert = $db->query("INSERT into patient (PPHOTO, PNAME, PPASSWORD, PEMAIL, PGENDER, PNUMBER, PADDRESS, PBLOOD_GROUP, PDATE_OF_BIRTH) VALUES ('$fileName', '$pname', '$ppassword', '$pemail', '$pgender', '$pnumber', '$paddress','$pbloodgroup', '$pdateofbirth')");
                if ($insert) {
                    echo "File uploaded successfully.";
                } else {
                    echo "File upload failed, please try again.";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
        }
    } else {
        echo "Error uploading file.";
    }
}
?>