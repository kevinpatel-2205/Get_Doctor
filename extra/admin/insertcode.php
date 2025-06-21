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

// If file upload form is submitted
if(isset($_POST["submit"])){
    $status = 'error';
    $statusMsg = '';

    // Sanitize inputs
    $aname = mysqli_real_escape_string($db, $_POST["aname"]);
    $apassword = mysqli_real_escape_string($db, $_POST["apassword"]);
    $aemail = mysqli_real_escape_string($db, $_POST["aemail"]);
    $ALAST_PASSWORD_CHANGE = mysqli_real_escape_string($db, $_POST["ALAST_PASSWORD_CHANGE"]);
    $anumber = mysqli_real_escape_string($db, $_POST["anumber"]);
    $address = mysqli_real_escape_string($db, $_POST["address"]);

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        // File upload path
        $targetDir = "aimage/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        // Get the file type
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {

                // Insert data into database
                $insertQuery = "INSERT INTO admin (aphoto, aname, apassword, aemail, ALAST_PASSWORD_CHANGE, anumber, aaddress) 
                                VALUES ('$imageName', '$aname', '$apassword', '$aemail', '$ALAST_PASSWORD_CHANGE', '$anumber', '$address')";
                
                if($db->query($insertQuery)){
                    $status = 'success';
                    $statusMsg = "File uploaded and records inserted successfully.";
                }else{
                    $statusMsg = "Error in inserting data into database: " . $db->error;
                }
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select an image file to upload.';
    }

    echo $statusMsg;
}

// Close database connection
$db->close();
?>